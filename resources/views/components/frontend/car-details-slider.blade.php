 
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
  <style>
      div#img_slides_wrapper {
          width: 100%;
          height: 450px;
          display: flex;
          border: 2px solid #ddd;
          justify-content: space-between;
          margin-bottom: 5px;
          position: relative;
      }

      div#img_slides_wrapper div#img_slides {
          overflow: hidden;
          display: flex;
          background-color: #0ff3;
      }

      img.imgSlide {
          width: 100%;
          height: 100%;
          opacity: 0;
          z-index: 1;
          position: absolute;
          top: 0;
          left: 0;
          transition-property: opacity;
          transition-duration: 750ms;
          transition-timing-function: ease;
          cursor: pointer;
      }

      img.imgSlide.active {
          opacity: 1;
      }

      img.imgThumbnail {
          width: 68px;
          height: 68px;
      }

      div.img_slide_arrow {
          color: transparent;
          height: inherit;
          width: 40px;
          position: absolute;
          z-index: 2;
          font-size: 20px;
          color: #ffffff;
          height: 40px;
          width: 40px;
          display: grid;
          justify-items: center;
          align-items: center;
          background-color: #00000033;
          position: absolute;
          top: 50%;
          transform: translateY(-50%);
      }

      div.img_slide_arrow:hover {
          cursor: pointer;
      }

      /*div.img_slide_arrow:hover>span {
    font-size: 20px;
    color: #ffffff;
    height: 40px;
    width: 40px;
    display: grid;
    justify-items: center;
    align-items: center;
    background-color: #00000033;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    }*/

      div.img_slide_arrow#img_slide_left {}

      div.img_slide_arrow#img_slide_right {
          right: 0;
      }

      div.img_slide_arrow#img_slide_left span {
          border-top-right-radius: 10px;
          border-bottom-right-radius: 10px;
      }

      div.img_slide_arrow#img_slide_right span {
          border-top-left-radius: 10px;
          border-bottom-left-radius: 10px;
          right: 0;
      }

      div#img_thumbnails {
          width: 100%;
          display: flex;
          flex-wrap: wrap;
          justify-content: center;
      }

      div#img_thumbnails img.imgThumbnail {
          background-color: #888;
          margin: 2px;
          border-radius: 3px;
      }

      div#img_thumbnails img.imgThumbnail:hover {
          cursor: pointer;
      }

      div#img_thumbnails img.imgThumbnail.active {
          border: 2px solid #D01818;
      }

  </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
 
  
      <div id="main_wrapper">
          <div id="img_slides_wrapper">
              <div id="img_slide_left" class="img_slide_arrow"><span>&#10094;</span></div>
              <div id="img_slides">
                    @foreach ($carDetails->images as $index=>$image)
                        <img data-index="{{$index}}" class="imgSlide" src="{{ config('constant.image_base_url') . '/upload/images/' . $image->file_name }}" alt="" />
                    @endforeach
                    @if ($carDetails->car_sold_status == 3)
                <img id="soldimg" src="{{asset('sold_img.png')}}" style="height: 70px; width: 100px">
            @endif
            @if ($carDetails->car_sold_status == 2)
                <img id="reserveimg" src="{{asset('reserved_img.png')}}" style="height: 70px; width: 100px">
            @endif
              </div>
              
              <div id="img_slide_right" class="img_slide_arrow"><span>&#10095;</span></div>
          </div>

          <div id="img_thumbnails">
                @foreach ($carDetails->images as $index=>$image)
                    <img data-index="{{$index}}" class="imgThumbnail" src="{{ config('constant.image_base_url') . '/upload/images/' . $image->file_name }}" alt="" />
                @endforeach
              
          </div>
            
      </div>