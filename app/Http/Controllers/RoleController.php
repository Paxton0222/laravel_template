<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\CrudByIdApiController;
use App\Http\Requests\Role\DeleteRoleDeleteRequest;
use App\Http\Requests\Role\GetRoleEditRequest;
use App\Http\Requests\Role\PostRoleCreateRequest;
use App\Http\Requests\Role\PutRoleUpdateRequest;
use App\Services\RoleService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class RoleController extends Controller
{
    use CrudByIdApiController {
        CrudByIdApiController::get as private getById;
        CrudByIdApiController::create as private createOne;
        CrudByIdApiController::update as private updateById;
        CrudByIdApiController::delete as private deleteById;
    }

    private RoleService $RoleService;

    public function __construct(RoleService $RoleService)
    {
        $this->RoleService = $RoleService;
        $this->initService($this->RoleService);
    }

    public function edit(GetRoleEditRequest $request): Response
    {
        [$page, $prePage, $search, $asc, $desc] = checkAndSetPageParameters($request, 1, 10);
        $pageInfo = $this->RoleService->getPage(page: $page, perPage: $prePage, search: $search, asc: $asc, desc: $desc);
        $result = [
            'query' => [
                'page' => $page,
                'perPage' => $prePage,
                'search' => $search,
                'asc' => $asc,
                'desc' => $desc,
            ],
        ];
        $result = array_merge($result, $pageInfo->toArray());

        return Inertia::render('RoleEdit', $result);
    }

    public function create(PostRoleCreateRequest $request): RedirectResponse
    {
        $this->createOne($request);

        return Redirect::to(route('role.edit', $request->query()));
    }

    public function update(PutRoleUpdateRequest $request): RedirectResponse
    {
        $this->updateById($request);

        return Redirect::to(route('role.edit', $request->query()));
    }

    public function delete(DeleteRoleDeleteRequest $request): RedirectResponse
    {
        $this->deleteById($request);

        return Redirect::to(route('role.edit', $request->query()));
    }
}
