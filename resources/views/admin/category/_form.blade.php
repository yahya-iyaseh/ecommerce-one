 <div class="row">
   <div class="col-md-6">
     <div class="form-group">
       <label for="categoryName">Category Name</label>
       <input type="text" id="categoryName" name="categoryName" aria-describedby="categoryName" placeholder="Enter The category Name" class="form-control @error('categoryName') is-invalid @enderror"
         value="{{ old('categoryName', $category->name) }}">
       @error('categoryName')
         <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
       @enderror
     </div>
     <div class="form-group">
       <label for="description">Category Description</label>
       <textarea type="text" id="description" name="description" aria-describedby="description" placeholder="Enter The category Description"
         class="form-control @error('description') is-invalid @enderror">{{ old('description', $category->description) }}</textarea>
       @error('description')
         <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
       @enderror
     </div>
   </div>
   <div class="col-md-6">
     <div class="form-group mt-4">
       <div class="custom-file ">
         <div>
           <input type="file" id="image" name="image" class="custom-file-input @error('image') is-invalid @enderror" value="{{ $category->image_url }}" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
           <label class="custom-file-label mt-0  mt-md-2" for="image">Category Image</label>
           @error('image')
             <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
           @enderror
         </div>
       </div>
     </div>
     <div class="text-center mt-0 col-12">
       <label for="image"> <img class="d-block mt-0 mx-auto cover center mb-2" id="blah" src="{{ $category->image_url }}" alt="{{ $category->image_url }}" width="240">
       </label>
     </div>
   </div>
   <div class="col-12">
     <button type="submit" class="btn btn-primary w-25">{{ $button }}</button>
     <a href="{{ route('admin.category.index') }}" class="btn btn-outline-dark">Return Back</a>
   </div>
 </div>
