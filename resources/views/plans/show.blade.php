<h3>{{ $plan->name }}</h3>
<h4>{{ $plan->price }}</h4>
<p class="features">Features</p>
<ul>
    @foreach($plan->features as $feature)
        <li>
            {{ $feature }}
        </li>
    @endforeach
</ul>
