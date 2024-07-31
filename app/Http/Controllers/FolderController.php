<?php

namespace App\Http\Controllers;

use App\Document;
use App\Folder;
use App\Repositories\CustomFieldRepository;
use App\Repositories\DocumentRepository;
use App\Repositories\FileTypeRepository;
use App\Repositories\PermissionRepository;
use App\Repositories\TagRepository;
use Illuminate\Http\Request;

class FolderController extends Controller
{
    private $tagRepository;
    private $documentRepository;
    private $customFieldRepository;
    private $fileTypeRepository;
    private $permissionRepository;

    public function __construct(
        TagRepository $tagRepository,
        DocumentRepository $documentRepository,
        CustomFieldRepository $customFieldRepository,
        FileTypeRepository $fileTypeRepository,
        PermissionRepository $permissionRepository
    ) {
        $this->tagRepository = $tagRepository;
        $this->documentRepository = $documentRepository;
        $this->customFieldRepository = $customFieldRepository;
        $this->fileTypeRepository = $fileTypeRepository;
        $this->permissionRepository = $permissionRepository;
    }
    public function index(Request $request)
    {
        $folders = Folder::whereNull('parent_id')->get();
        $documents = Document::where('parent_id')->get();

        return view('metronic.folders.index', compact('folders', 'documents'));
    }

    public function show(Request $request, $id)
    {
        // $document = $this->documentRepository
        //     ->getOneEagerLoaded($id, ['files', 'files.fileType', 'files.createdBy', 'activities', 'activities.createdBy', 'tags']);
        // if (empty($document)) {
        //     abort(404);
        // }
        // $this->authorize('view', $document);

        // $missigDocMsgs = $this->documentRepository->buildMissingDocErrors($document);
        // $dataToRet = compact('document', 'missigDocMsgs');

        // if (auth()->user()->can('user manage permission')) {
        //     $users = User::where('id', '!=', 1)->get();
        //     $thisDocPermissionUsers = $this->permissionRepository->getUsersWiseDocumentLevelPermissionsForDoc($document);
        //     //Tag Level permission
        //     $tagWisePermList = $this->permissionRepository->getTagWiseUsersPermissionsForDoc($document);
        //     //Global Permission
        //     $globalPermissionUsers = $this->permissionRepository->getGlobalPermissionsForDoc($document);

        //     $dataToRet = array_merge($dataToRet, compact('users', 'thisDocPermissionUsers', 'tagWisePermList', 'globalPermissionUsers'));
        // }
        // return view('metronic.documents.show', $dataToRet);

        $this->authorize('viewAny', Document::class);
        $folder = Folder::find($id);

        $parents = Folder::where('id', $folder->parent_id)
            ->with('parent.parent')
            ->get();
        // dd($parents);
        $folders = Folder::where('parent_id', $id)->get();
        // dd($folders->children());
        $documents = $this->documentRepository->searchDocuments(
            $request->get('search'),
            $request->get('tags'),
            $request->get('status')
        )->where('folder_id', $id);
        $tags = $this->tagRepository->all();
        return view('metronic.folders.show', compact('parents', 'folder', 'folders', 'documents', 'tags'));

        // return view('metronic.folders.show');
    }
}
