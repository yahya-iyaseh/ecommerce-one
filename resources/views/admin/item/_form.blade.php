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
              <input type="file" id="image" name="image" class="custom-file-input @error('image') is-invalid @enderror" value="{{ old('image', $item->image) }}">
              <label class="custom-file-label" for="image">Item Image</label>
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


          <button type="submit" class="btn btn-primary w-25">
            {{ $button }}
          </button>
          <a href="{{ route('admin.item.index') }}" class="btn btn-outline-dark">Return Back</a>
