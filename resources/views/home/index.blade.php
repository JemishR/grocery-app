@extends('layouts.app')
@section('content')
<section class="hero"><div><small>FRESH GROCERIES · SURAT</small><h1>Everyday groceries, made easy.</h1><p>Shop vegetarian groceries online and enter your Surat delivery address. Our admin team handles delivery.</p><a class="btn" href="/products">Shop groceries →</a></div><div class="heroart">🥦 🍅 🧀<br>🌾 🫗 🍊</div></section>
<h2>Shop by category</h2><div class="grid cats">@foreach($categories as $c)<a class="card cat" href="/products"><div class="ico">🥦</div><b>{{ $c->name }}</b><small>{{ $c->products_count }} items</small></a>@endforeach</div>
<h2>Popular groceries</h2><div class="grid products">@foreach($products as $p)<div class="card"><div class="pic">🛒</div><b>{{ $p->name }}</b><small>{{ $p->unit }}</small><strong>₹{{ number_format($p->price,2) }}</strong><form method="post" action="/cart/add/{{ $p->id }}">@csrf<button class="btn small">Add</button></form></div>@endforeach</div>
@endsection