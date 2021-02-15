<div class="d-flex justify-content-center">
    <div class="w-6/12">
        <h1 class="my-10 text-3xl d-flex justify-content-center"> Comments </h1>
        <section>
        <img src="{{$image}}" width="200" />
        <input type="file" id="image" wire:change="$emit('fileChoosen')">
        </section>
        @error('newComments') <span class="text-danger text-sm">{{$message}}</span>@enderror
        <div>
            @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @elseif (session()->has('messageDeleted'))
            <div class="alert alert-danger">
                {{ session('messageDeleted') }}
            </div>
            @endif
        </div>
        <form class="my-4 d-flex" wire:submit.prevent="addComment">
            <input type="text" class="w-5 rounded-border shadow p-3 my-3" placeholder="what's on your mind?"
                wire:model.lazy="newComments">
            <div class="py-3 d-grid gap-2 col-7 mx-auto">
                <button type="submit" class="btn btn-primary py-3 d-grid gap-2 col-7 mx-auto">ADD</button>
            </div>
        </form>
        @foreach($comments as $comment)
        <div class="rounded border shadow p-3 my-2">
            <button class="fas fa-times float-right text-danger outline-danger"
                wire:click="remove({{$comment->id}})"></button>
            <div class="flex justify-between my-2">
                <div class="d-flex">
                    <p class="font-weight-bold text-lg">{{$comment->user_id}} | </p>
                    <p class="mx-2 text-sm text-secondary font-weight-light">{{$comment->created_at}}</p>
                </div>

            </div>
            <p class="text-secondary">{{$comment->body}}</p>
        </div>
        @endforeach
        <div class="w-6/12">
        <p>{{$comments->links('pagination-links')}}</p>
        </div>
    </div>
</div>



<script>
Livewire.on('fileChoosen', () => {
    let inputField = document.getElementbyId('image')
    let file = inputField.files[0]
    let reader = new FileReader();
    reader.onload = () => {
        window.livewire.emit('fileUpload', reader.result)
    }
    reader.readAsDataURL(file);
})
</script>

