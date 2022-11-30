<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TblProveedor\BulkDestroyTblProveedor;
use App\Http\Requests\Admin\TblProveedor\DestroyTblProveedor;
use App\Http\Requests\Admin\TblProveedor\IndexTblProveedor;
use App\Http\Requests\Admin\TblProveedor\StoreTblProveedor;
use App\Http\Requests\Admin\TblProveedor\UpdateTblProveedor;
use App\Models\TblProveedor;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class TblProveedorController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexTblProveedor $request
     * @return array|Factory|View
     */
    public function index(IndexTblProveedor $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(TblProveedor::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'nombre', 'fecha', 'estado'],

            // set columns to searchIn
            ['id', 'nombre']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.tbl-proveedor.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.tbl-proveedor.create');

        return view('admin.tbl-proveedor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTblProveedor $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreTblProveedor $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the TblProveedor
        $tblProveedor = TblProveedor::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/tbl-proveedors'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/tbl-proveedors');
    }

    /**
     * Display the specified resource.
     *
     * @param TblProveedor $tblProveedor
     * @throws AuthorizationException
     * @return void
     */
    public function show(TblProveedor $tblProveedor)
    {
        $this->authorize('admin.tbl-proveedor.show', $tblProveedor);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param TblProveedor $tblProveedor
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(TblProveedor $tblProveedor)
    {
        $this->authorize('admin.tbl-proveedor.edit', $tblProveedor);


        return view('admin.tbl-proveedor.edit', [
            'tblProveedor' => $tblProveedor,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTblProveedor $request
     * @param TblProveedor $tblProveedor
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateTblProveedor $request, TblProveedor $tblProveedor)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values TblProveedor
        $tblProveedor->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/tbl-proveedors'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/tbl-proveedors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyTblProveedor $request
     * @param TblProveedor $tblProveedor
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyTblProveedor $request, TblProveedor $tblProveedor)
    {
        $tblProveedor->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyTblProveedor $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyTblProveedor $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    TblProveedor::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
