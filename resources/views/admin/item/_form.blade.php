          <div class="form-group">
            <label for="name">Item Name</label>
            <input type="text" id="name" name="name" aria-describedby="name" placeholder="Enter The Item Name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $item->name) }}">
            @error('name')
              <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
          </div>
          <div class="form-group">
            <label for="summernote">Item Description</label>
            <textarea type="text" id="summernote" name="description" aria-describedby="description" placeholder="Enter The Item Description"
              class="form-control @error('description') is-invalid @enderror">{{ old('description', $item->description) }}</textarea>
            @error('description')
              <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
          </div>
          <div class="form-group">
            <label for="name">Item Price</label>
            <input type="number" step="0.01" name="price" placeholder="Enter The Item Price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $item->price) }}">
            @error('price')
              <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
          </div>
          <div class="form-group">
            <div class="custom-file">
              <input type="file" id="image" name="image" class="custom-file-input @error('image') is-invalid @enderror" value="{{ old('image', $item->image) }}"
                onchange="document.getElementById('change-image').src = window.URL.createObjectURL(this.files[0])">
              <label class="custom-file-label" for="image">Item Image</label>
              <label for="image" class="d-flex justify-center">
                <img src="{{ $item->image_url }}" width="300" class="mt-3" alt="" id="change-image">

              </label>
              @error('image')
                <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            </div>
          </div>
          <div class="form-group">
            <label for="summernote2">Item Additional Info</label>
            <textarea type="text" id="summernote2" name="additional_info" aria-describedby="additional_info" placeholder="Enter The Item Additional Info"
              class="form-control @error('additional_info') is-invalid @enderror">{{ old('additional_info', $item->additional_info) }}</textarea>
            @error('additional_info')
              <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
          </div>



          <div class="form-group">
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id" class="form-control @error('category_id')
                            is-invalid
                      @enderror">
              <option value="">No parent</option>
              @foreach ($categories as $category)
                <option value="{{ $category->id }}" @if (old('category_id', $item->category_id) == $category->id)
                  selected
              @endif>{{ $category->name }}</option>
              @endforeach
            </select>
            @error('category_id')
              <span class="invliad-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
          </div>

          <div class="form-group">
            <label for="sub_category">Sub Category</label>
            <select name="sub_category" id="sub_category" class="form-control">
              <option value="">Select</option>
            </select>
          </div>

          <input type="hidden" value="{{ old('sub_category', $item->sub_category) }}" id="subCId" class="form-control" />
          <button type="submit" class="btn btn-primary w-25">
            {{ $button }}
          </button>
          <a href="{{ route('admin.item.index') }}" class="btn btn-outline-dark">Return Back</a>

          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
          <script type="text/javascript">
            $(document).ready(function() {
              let id = $('select[name="category_id"]').val()
              if (id) {
                $.ajax({
                  url: '/subCategories/' + id,
                  type: "GET",
                  dataType: "JSON",
                  success: function(data) {
                      let subid = $('#subCId').val()

                    $('select[name="sub_category"]').empty()

                    $('select[name="sub_category"]').append(`<option value="">Select</option>`)
                    $.each(data, function(key, value) {
                      if (subid == key) {

                          $('select[name="sub_category"]').append(`<option value="${key}" selected>${value}</option>`)
                        } else {
                          $('select[name="sub_category"]').append(`<option value="${key}">${value}</option>`)

                        }

                    })
                  }
                })
              } else {
                $('select[name="sub_category"]').empty()
                $('select[name="sub_category"]').append(`<option value="">Select</option>`)


              }

            })
          </script>
          <script type="text/javascript">
            $(document).ready(function() {
              $('select[name="category_id"]').on('change', function() {
                if (catId) {
                  $.ajax({
                    url: '/subCategories/' + catId,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data) {
                      $('select[name="sub_category"]').empty()


                      $('select[name="sub_category"]').append(`<option value="">Select</option>`)
                      $.each(data, function(key, value) {

                          $('select[name="sub_category"]').append(`<option value="${key}">${value}</option>`)


                      })
                    }
                  })
                } else {
                  $('select[name="sub_category"]').empty()
                  $('select[name="sub_category"]').append(`<option value="">Select</option>`)


                }
              })

            })
          </script>
