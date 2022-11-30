<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TblArticulo\BulkDestroyTblArticulo;
use App\Http\Requests\Admin\TblArticulo\DestroyTblArticulo;
use App\Http\Requests\Admin\TblArticulo\IndexTblArticulo;
use App\Http\Requests\Admin\TblArticulo\StoreTblArticulo;
use App\Http\Requests\Admin\TblArticulo\UpdateTblArticulo;
use App\Models\TblArticulo;
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

class TblArticuloController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexTblArticulo $request
     * @return array|Factory|View
     */
    public function index(IndexTblArticulo $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(TblArticulo::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'nombre', 'descripcion', 'cantidad', 'precio', 'estado', 'id_animal', 'id_proveedor'],

            // set columns to searchIn
            ['id', 'nombre', 'descripcion']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.tbl-articulo.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.tbl-articulo.create');

        return view('admin.tbl-articulo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTblArticulo $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreTblArticulo $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the TblArticulo
        $tblArticulo = TblArticulo::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/tbl-articulos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/tbl-articulos');
    }

    /**
     * Display the specified resource.
     *
     * @param TblArticulo $tblArticulo
     * @throws AuthorizationException
     * @return void
     */
    public function show(TblArticulo $tblArticulo)
    {
        $this->authorize('admin.tbl-articulo.show', $tblArticulo);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param TblArticulo $tblArticulo
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(TblArticulo $tblArticulo)
    {
        $this->authorize('admin.tbl-articulo.edit', $tblArticulo);


        return view('admin.tbl-articulo.edit', [
            'tblArticulo' => $tblArticulo,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTblArticulo $request
     * @param TblArticulo $tblArticulo
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateTblArticulo $request, TblArticulo $tblArticulo)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values TblArticulo
        $tblArticulo->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/tbl-articulos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/tbl-articulos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyTblArticulo $request
     * @param TblArticulo $tblArticulo
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyTblArticulo $request, TblArticulo $tblArticulo)
    {
        $tblArticulo->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyTblArticulo $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyTblArticulo $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    TblArticulo::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
