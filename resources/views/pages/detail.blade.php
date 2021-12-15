@extends('layouts.app')

@section('title')
Detail Products | {{ config('settings.name') }}
@endsection

@section('content')
<div class="page-content page-details">
    <section class="store-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Product Details
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="store-gallery mb-3" id="picture">
        <div class="container">
            <div class="row">
                <div class="col-lg-8" data-aos="zoom-in">
                    @if(session()->get('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div><br />
                    @endif
                    <transition name="slide-fade" mode="out-in">
                        <img :src="photos[activePhoto].url" :key="photos[activePhoto].id" class="w-100 main-image"
                            alt="" />
                    </transition>
                </div>
                <div class="col-lg-2">
                    <div class="row">
                        <div class="col-3 col-lg-12 mt-2 mt-lg-0" v-for="(photo, index) in photos" :key="photo.id"
                            data-aos="zoom-in" data-aos-delay="100">
                            <a href="#" @click="changeActive(index)">
                                <img :src="photo.url" class="w-100 thumbnail-image"
                                    :class="{ active: index == activePhoto }" alt="" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="store-details-container" data-aos="fade-up">
        <section class="store-heading">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <h1>{{ $item->nm_items }}</h1>
                        <div class="price">
                            Stock: ({{ $item->quantity }})
                        </div>
                    </div>
                    <div class="col-lg-2 price">
                        @php $total = 0 @endphp
                        @if($item->discount > 0)
                        @php $total += $item['price'] - (($item['price'] * $item['discount']) / 100) @endphp
                        <s>@currency($item->price)</s>
                        @else($item->discount = 0)
                        @php $total += $item['price'] @endphp
                        @endif
                        <p><b>@currency($total)</p></b>
                    </div>
                    <div class="col-lg-2" data-aos="zoom-in">
                        @auth
                        @csrf
                        @if ($item->quantity > 0)
                        <a class="btn btn-success px-4 text-white btn-block mb-3"
                            href="{{url('add-to-cart/'.$item->id)}}">
                            Add to Cart
                        </a>
                        @elseif ($item->quantity == 0)
                        <button class="btn btn-success px-4 text-white btn-block mb-3" disabled="disabled">
                            Out of Stock
                        </button>
                        @endif
                        @else
                        <a href="{{ route('login') }}" class="btn btn-success px-4 text-white btn-block mb-3">
                            Log In to Add
                        </a>
                        @endauth
                    </div>
                </div>
            </div>
        </section>
        <section class="store-description" data-aos="zoom-out">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        {!! html_entity_decode($item->description) !!}
                    </div>
                </div>
            </div>
        </section>

        <section class="store-review" data-aos="fade-zoom-in">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-8 mt-3">
                        <h4>Customers Review</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-8">
                        @auth
                        <a href="{{ route('review') }}" class="btn btn-success px-4 text-white mt-2 mb-4">
                            Add Review
                        </a>
                        @else
                        <a href="{{ route('login') }}" class="btn btn-success px-4 text-white mt-2 mb-4">
                            Log In to Add
                        </a>
                        @endauth
                        @forelse ($review as $rv)
                        @if($rv->item_id == $item->id)
                        <ul class="list-unstyled">
                            <li class="media">
                                <img src="/images/user.png" alt="" class="mr-3 rounded-circle" />
                                <div class="media-body">
                                    <h4 class="mt-2">{{$rv->user['name']}}</h4>
                                    <h5 class="mb-2">{{ $rv->created_at }}</h5>
                                    {!! html_entity_decode($rv->comment) !!}
                                </div>
                            </li>
                        </ul>
                        @endif
                        @empty
                        <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
                            Empty Review
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection

@push('addon-script')
<script src="/vendor/vue/vue.js"></script>
<script>
    var picture = new Vue({
        el: "#picture",
        mounted() {
          AOS.init();
        },
        data: {
          activePhoto: 0,
          photos: [
            @foreach ($item->pictures as $picture)
            {
              id: {{ $picture->id }},
              url: "{{ asset('/images/items/'.$picture->value) }}",
            },
            @endforeach
          ],
        },
        methods: {
          changeActive(id) {
            this.activePhoto = id;
          },
        },
      });
</script>
@endpush