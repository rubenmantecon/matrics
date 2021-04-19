<x-app-layout page="requirements"> 
    <div>
        <form action="/api/uploads" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            @csrf
            <input type="file" name="file" id="file">
            <input type="text" name="req_enrol_id" value="1">
            <button class="btn primary-btn" type="submit">Submit</button>
        </form>
    </div>
</x-app-layout>

