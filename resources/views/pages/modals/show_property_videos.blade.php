<div class="row">
    @foreach(getPropertyMedia($arguments['id'],"video") as $video)
        <div class="col-md-6 text-center">
            <a href="{{ Storage::url($video) }}" class="popup-youtube">
                <img src="{{ Storage::url($video) }}" alt="Plot Pedia - Property Video" width="200">
            </a>
        </div>
    @endforeach
</div>