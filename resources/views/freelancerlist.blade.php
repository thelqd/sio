<x-header />
<div>
    Bitte Freelancer w&auml;hlen:<br />
    @foreach($freelancers as $freelancer)
        <a href="{{ route('freelancer.show', ['freelancerId' => $freelancer->id]) }}">{{$freelancer->name}}</a><br />
    @endforeach
</div>
<x-footer />
