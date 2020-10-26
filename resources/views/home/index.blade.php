@extends('layouts.app')
@section('content')
<div class="col-12">
    <h2><b>Items Management Page</b></h2>
    <div class="row mb-3">
        <div class="col-5">
            <form action="{{route('addNewItem')}}" class="ajaxForm" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control newItemName" name="name" placeholder="Item Name">
                    <div class="input-group-append">
                        <button type="submit" class="input-group-text addNewItem" id="basic-addon2">Add New Item</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row listManageSection" data-url="{{route('listStore')}}">
        <div class="col-5">
            <select multiple="multiple" class="form-control leftItemList">
                @foreach($getAllItems as $val)
                <option value="{{$val->id}}">{{$val->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-2">
            <div class="text-center">
                <button type="button" id='btnRight'class="btn btn-secondary mt-1 moveItem" data-action="right" >></button><br /><br />
                <button type='button' id='btnLeft' class="btn btn-secondary moveItem" data-action="left"><</button><br />
            </div>
        </div>
        <div class="col-5">
            <select multiple="multiple" class="form-control rightItemList">
                @foreach($selectedItem as $val)
                <option value="{{$val->item_id}}">{{$val->getItem->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
@endsection