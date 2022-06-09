<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Support\Arr;

class MenuController extends Controller
{
    public function index (){
        $assets = $this->brand
        ->select() ('id','name', DB::raw('null as parent_id))
        ->leftJoin( function ($join) use ($supplierId) {
            $join->on('asset_id', '=', 'id')
                ->where('supplier_id', $supplierId)
                ->where('asset_parent_id', null);
        })
        ->with(array('children' => function ($query) use ($supplierDeliveryCountries, $supplierId) {
            $query->select()'brand_regions.id', 'brand_regions.name', 'brand_id', DB::raw('2 as parent_id)
                ->leftJoin( function ($join) use ($supplierId) {
                    $join->on('asset_id', '=', 'brand_regions.id')
                        ->where('supplier_id', $supplierId)
                        ->where('asset_parent_id', 2);
                })
                ->where('status', '=', BrandRegion::STATUS_ACTIVE);
        }, 'children.children' => function ($query) use ($supplierDeliveryCountries, $supplierId) {
            $query->select()'branches.id', 'branches.name', 'country_id', 'brand_region_id', DB::raw('3 as parent_id))
                ->leftJoin( function ($join) use ($supplierId) {
                    $join->on('asset_id', '=', 'branches.id')
                        ->where('supplier_id', $supplierId)
                        ->where('asset_parent_id', 3);
                })
                ->where('branches.location_parent_id', '=', null)//location parent_id is null for branch
                ->whereIn('country_id', $supplierDeliveryCountries)
                ->where('status', '=', Branch::STATUS_ACTIVE);
        }))
        ->where('company_id', $companyId)
        ->where('status', '=', Brand::STATUS_ACTIVE)
        ->get();
    }
}
