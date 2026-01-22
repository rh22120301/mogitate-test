@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="fruits-content">
    <div class=fruits-top>
        <p class="fruits-heading">商品一覧</p>
        <a href="/products/register" class="add-button">+商品を追加</a>
    </div>

    <div class="container">
        <div class="search-content">
            <form class="search-form" action="/products/search" method="get">
            @csrf
                <div class="search-form__keyword">
                    <input class="search-form__item-input" type="text" name="keyword" placeholder="商品名で検索">
                    <button class="search-form__button-submit" type="submit">検索</button>
                </div>

                <div class="search-form__sort">
                    <p class="search-form__sort-title">価格順で表示</p>
                    <select class="search-form__sort-option" name="sort">
                        <option value="">並び替え</option>
                        <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>価格が安い順</option>
                        <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>価格が高い順</option>
                    </select>
                    <div class="sort-botton">
                        <button class="search-form__sort-button"type="submit">
                            価格順で表示
                        </button>
                        <a class="search-form__cancel" href="/products">×</a>
                    </div>
                </div>
            </form>
        </div>

        <div class="fruits-card">
            @foreach ($products as $product)
                <a href="/products/detail/{{ $product->id }}" class="fruits-card__group">
                    <div class="card-image">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="">    
                    </div>

                    <div class="card-body">
                        <p class="card-body__title">{{ $product->name }}</p>
                        <p class="card-body__price">¥{{ $product->price }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
        {{ $products->links('vendor.pagination.bootstrap-4') }}
</div>
    
@endsection