<form action="/clubs/{{ $club->id }}/join" method="POST">
    @csrf
    <button type="submit" class="btn btn-primary">Join {{ $club->name }}</button>
    
</form>
