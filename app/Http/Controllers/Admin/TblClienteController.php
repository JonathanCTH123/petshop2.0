<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TblCliente\BulkDestroyTblCliente;
use App\Http\Requests\Admin\TblCliente\DestroyTblCliente;
use App\Http\Requests\Admin\TblCliente\IndexTblCliente;
use App\Http\Requests\Admin\TblCliente\StoreTblCliente;
use App\Http\Requests\Admin\TblCliente\UpdateTblCliente;
use App\Models\TblCliente;
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

class TblClienteController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexTblCliente $request
     * @return array|Factory|View
     */
    public function index(IndexTblCliente $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(TblCliente::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'nombres', 'apellidos', 'dui', 'fecha_nacimiento', 'img'],

            // set columns to searchIn
            ['id', 'nombres', 'apellidos', 'dui', 'img']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.tbl-cliente.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.tbl-cliente.create');

        return view('admin.tbl-cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTblCliente $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreTblCliente $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the TblCliente
        $tblCliente = TblCliente::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/tbl-clientes'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/tbl-clientes');
    }

    /**
     * Display the specified resource.
     *
     * @param TblCliente $tblCliente
     * @throws AuthorizationException
     * @return void
     */
    public function show(TblCliente $tblCliente)
    {
        $this->authorize('admin.tbl-cliente.show', $tblCliente);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param TblCliente $tblCliente
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(TblCliente $tblCliente)
    {
        $this->authorize('admin.tbl-cliente.edit', $tblCliente);


        return view('admin.tbl-cliente.edit', [
            'tblCliente' => $tblCliente,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTblCliente $request
     * @param TblCliente $tblCliente
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateTblCliente $request, TblCliente $tblCliente)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values TblCliente
        $tblCliente->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/tbl-clientes'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/tbl-clientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyTblCliente $request
     * @param TblCliente $tblCliente
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyTblCliente $request, TblCliente $tblCliente)
    {
        $tblCliente->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyTblCliente $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyTblCliente $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    TblCliente::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
