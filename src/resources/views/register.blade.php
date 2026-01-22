@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="register-content">
    <div class="register__heading">
        <h2>商品登録</h2>
    </div>

    <form class="form" action="{{ route('products.store') }}" method="post" enctype='multipart/form-data'>
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <p class="form__group-item">商品名</p>
                <p class="form__group-require">必須</p>
            </div>
            <div class="form__group-input">
                <input type="text" name="name" placeholder="商品名を入力" />
            </div>
            <div class="form__error">
            @error('name')
                {{ $message }} 
            @enderror
            </div>
        </div>

        <div class="form__group">
            <div class="form__group-title">
                <p class="form__group-item">値段</p>
                <p class="form__group-require">必須</p>
            </div>
            <div class="form__group-input">
                <input type="text" name="price" placeholder="値段を入力" />
            </div>
            <div class="form__error">
            @error('price')
                {{ $message }} 
            @enderror
            </div>
        </div>

        <div class="form__group">
            <div class="form__group-title">
                <p class="form__group-item">商品画像</p>
                <p class="form__group-require">必須</p>
            </div>
            <div class="form__group-input">
                <input type="file" name="image" accept="image/png, image/jpeg">
            </div>
            <div class="form__error">
            @error('image')
                {{ $message }} 
            @enderror
            </div>
        </div>

        <div class="form__group">
            <div class="form__group-title">
                <p class="form__group-item">季節</p>
                <p class="form__group-require">必須</p>
            </div>
            @foreach ($seasons as $season)
                <label class="season-label">
                    <input type="checkbox" name="seasons[]" value="{{ $season->id }}">
                    <span class="custom-checkbox"></span>{{ $season->name }}
                </label>
            @endforeach
            <div class="form__error">
            @error('seasons')
                {{ $message }} 
            @enderror
            </div>
        </div>

        <div class="form__group">
            <div class="form__group-title">
                <p class="form__group-item">商品説明</p>
                <p class="form__group-require">必須</p>
            </div>
            <div class="form__group-input">
                <textarea name="description" placeholder="商品の説明を入力" rows="8"></textarea>
            </div>
            <div class="form__error">
            @error('description')
                {{ $message }} 
            @enderror
            </div>
        </div>

        <div class="form__button">
          <a href="{{ route('products.index') }}" class="form__button-back">戻る</a>
          <button class="form__button-register" type="submit">登録</button>
        </div>
    </form>
</div>
@endsection