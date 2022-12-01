<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TblFactura\BulkDestroyTblFactura;
use App\Http\Requests\Admin\TblFactura\DestroyTblFactura;
use App\Http\Requests\Admin\TblFactura\IndexTblFactura;
use App\Http\Requests\Admin\TblFactura\StoreTblFactura;
use App\Http\Requests\Admin\TblFactura\UpdateTblFactura;
use App\Models\TblFactura;
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
use App\Models\TblCliente;

class TblFacturaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexTblFactura $request
     * @return array|Factory|View
     */
    public function index(IndexTblFactura $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(TblFactura::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'id_cliente', 'fecha', 'estado'],

            // set columns to searchIn
            ['id'],

            function ($query) use ($request) {
                $query->with(['Cliente']);
            }
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.tbl-factura.index', [
            'data' => $data,
            'clientes' => TblCliente::all()

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.tbl-factura.create');

        return view('admin.tbl-factura.create',
        [
            'clientes' => TblCliente::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTblFactura $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreTblFactura $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['id_cliente'] = $sanitized['id_cliente']['key'];

        // Store the TblFactura
        $tblFactura = TblFactura::create($sanitized);


        if ($request->ajax()) {
            return ['redirect' => url('admin/tbl-facturas'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/tbl-facturas');
    }

    /**
     * Display the specified resource.
     *
     * @param TblFactura $tblFactura
     * @throws AuthorizationException
     * @return void
     */
    public function show(TblFactura $tblFactura)
    {
        $this->authorize('admin.tbl-factura.show', $tblFactura);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param TblFactura $tblFactura
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(TblFactura $tblFactura)
    {
        $this->authorize('admin.tbl-factura.edit', $tblFactura);


        return view('admin.tbl-factura.edit', [
            'tblFactura' => $tblFactura,
            'clientes' => TblCliente::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTblFactura $request
     * @param TblFactura $tblFactura
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateTblFactura $request, TblFactura $tblFactura)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['id_cliente'] = $sanitized['id_cliente']['key'];

        // Update changed values TblFactura
        $tblFactura->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/tbl-facturas'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/tbl-facturas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyTblFactura $request
     * @param TblFactura $tblFactura
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyTblFactura $request, TblFactura $tblFactura)
    {
        $tblFactura->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyTblFactura $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyTblFactura $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    TblFactura::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
