<div class="row">
    @foreach(getPropertyMedia($arguments['id'],"image") as $image)
        <div class="col-md-6 text-center">
            <div class="popup-images">
                <a href="{{ Storage::url($image) }}" class="popup-img">
                    <img src="{{ Storage::url($image) }}" alt="Plot Pedia - Property Images" width="200">
                </a>
            </div>
        </div>
    @endforeach
</div>