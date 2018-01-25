<header id="header">
    
    @if(Auth::user())
    	@include('partials.header.admin')
    @endif
{{-- 
    @include('partials.header.public')
 --}}
</header>