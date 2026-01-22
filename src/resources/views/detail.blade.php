@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('content')
<div class="detail-content">
    <div class="detail__heading">
        <a href="/products" class="back-link">商品一覧</a>
        <label class="current-fruits">> {{ $product['name'] }}</label>
    </div>
    
    <form class="update-form" action="/products/{productId}/update" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @csrf

        <div class="update-form__top">
            <div class="update-form__group-image">
                <img src="{{ asset('storage/' . $product->image) }}">
                <input type="file" name="image" accept="image/png, image/jpeg">
                <div class="form__error">
                    @error('image')
                        {{ $message }} 
                    @enderror
                </div>
            </div>
            
            <div class="update-form__group-info">
                <p class="form__group-item">商品名</p>
                <input class="update-form__item-input" type="text" name="name" value="{{ $product['name'] }}">
                <div class="form__error">
                    @error('name')
                        {{ $message }} 
                    @enderror
                </div>
            
                <p class="form__group-item">値段</p>
                <input class="update-form__item-input" type="text" name="price" value="{{ $product['price'] }}">
                <div class="form__error">
                    @error('price')
                        {{ $message }} 
                    @enderror
                </div>
            
                <div class="season-group">
                    <p class="form__group-item">季節</p>
                    @foreach ($seasons as $season)
                        <label class="season-label">
                            <input type="checkbox" name="seasons[]" value="{{ $season->id }}" 
                            {{ $product->seasons->contains($season->id) ? 'checked' : '' }}>

                            <span class="custom-checkbox"></span>{{ $season->name }}
                        </label>
                    @endforeach
                    <div class="form__error">
                    @error('seasons')
                        {{ $message }} 
                    @enderror
                </div>
                </div>
            </div>
        </div>
        
        <div class="update-form__group-bottom">
            <div class="update-form__group-description">
                <p class="form__group-item">商品説明</p>
                <textarea class="update-form__item-textarea" name="description" placeholder="商品の説明を入力" rows="8">{{ $product['description'] }}</textarea>
            <div class="form__error">
                    @error('description')
                        {{ $message }} 
                    @enderror
                </div>
            </div>
            
        </div>

        <input type="hidden" name="id" value="{{ $product['id'] }}">

        <div class="form__button">
            <a href="/products" class="form__button-back">戻る</a>
            <button class="form__button-update" type="submit">変更を保存</button>
        
    </form>

        <form action="/products/{productId}/delete" method="POST">
            @csrf
            @method('DELETE')
            <input type="hidden" name="id" value="{{ $product['id'] }}">
            <button class="form__button-delete" type="submit">削除</button>
        </form>
        </div>
</div>

@endsection