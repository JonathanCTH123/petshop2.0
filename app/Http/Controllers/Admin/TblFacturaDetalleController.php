<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TblFacturaDetalle\BulkDestroyTblFacturaDetalle;
use App\Http\Requests\Admin\TblFacturaDetalle\DestroyTblFacturaDetalle;
use App\Http\Requests\Admin\TblFacturaDetalle\IndexTblFacturaDetalle;
use App\Http\Requests\Admin\TblFacturaDetalle\StoreTblFacturaDetalle;
use App\Http\Requests\Admin\TblFacturaDetalle\UpdateTblFacturaDetalle;
use App\Models\TblFacturaDetalle;
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
use App\Models\TblArticulo;
use App\Models\TblFactura;

class TblFacturaDetalleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexTblFacturaDetalle $request
     * @return array|Factory|View
     */
    public function index(IndexTblFacturaDetalle $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(TblFacturaDetalle::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'id_factura', 'id_articulo', 'cantidad', 'precio_unitario'],

            // set columns to searchIn
            ['id'],

            function ($query) use ($request) {
                $query->with(['Factura']);
                $query->with(['Articulo']);

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

        return view('admin.tbl-factura-detalle.index', [
            'data' => $data,
            'articulos' => TblArticulo::all(),
            'facturas' => TblFactura::all()
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
        $this->authorize('admin.tbl-factura-detalle.create');

        return view('admin.tbl-factura-detalle.create', [
            'articulos' => TblArticulo::all(),
            'facturas' => TblFactura::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTblFacturaDetalle $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreTblFacturaDetalle $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['id_factura'] = $sanitized['id_factura']['key'];
        $sanitized['id_articulo'] = $sanitized['id_articulo']['key'];

        // Store the TblFacturaDetalle
        $tblFacturaDetalle = TblFacturaDetalle::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/tbl-factura-detalles'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/tbl-factura-detalles');
    }

    /**
     * Display the specified resource.
     *
     * @param TblFacturaDetalle $tblFacturaDetalle
     * @throws AuthorizationException
     * @return void
     */
    public function show(TblFacturaDetalle $tblFacturaDetalle)
    {
        $this->authorize('admin.tbl-factura-detalle.show', $tblFacturaDetalle);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param TblFacturaDetalle $tblFacturaDetalle
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(TblFacturaDetalle $tblFacturaDetalle)
    {
        $this->authorize('admin.tbl-factura-detalle.edit', $tblFacturaDetalle);


        return view('admin.tbl-factura-detalle.edit', [
            'tblFacturaDetalle' => $tblFacturaDetalle,
            'articulos' => TblArticulo::all(),
            'facturas' => TblFactura::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTblFacturaDetalle $request
     * @param TblFacturaDetalle $tblFacturaDetalle
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateTblFacturaDetalle $request, TblFacturaDetalle $tblFacturaDetalle)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        // $sanitized['id_factura'] = $sanitized['id_factura']['key'];
        $sanitized['id_articulo'] = $sanitized['id_articulo']['key'];

        // Update changed values TblFacturaDetalle
        $tblFacturaDetalle->update($sanitized);


        if ($request->ajax()) {
            return [
                'redirect' => url('admin/tbl-factura-detalles'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/tbl-factura-detalles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyTblFacturaDetalle $request
     * @param TblFacturaDetalle $tblFacturaDetalle
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyTblFacturaDetalle $request, TblFacturaDetalle $tblFacturaDetalle)
    {
        $tblFacturaDetalle->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyTblFacturaDetalle $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyTblFacturaDetalle $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    TblFacturaDetalle::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
