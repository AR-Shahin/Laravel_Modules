@extends('layouts.app')
@section('title', 'Image Upload with axious')

@section('app_content')

<div class="container mt-5">
    <h1 class="text-center text-info">Image Upload With Axios</h1>
<hr>
<div class="row justify-content-center">
<div class="col-4">
    <div class="form-group">
        <input type="file" class="form-control" id="file">
    </div>
    <div class="form-group">
        <button class="btn btn-sm btn-block btn-success" id="imgUploadBtn">Upload</button>
    </div>
    <span id="uploadStatus"></span>
</div>
<div class="col-8">
 <div class="card">
     <div class="card-body">
     <table class="table table-stripe table-bordered">
         <thead>
             <tr>
                 <th>SL</th>
                 <th>Download</th>
                 <th>Delete</th>
             </tr>
         </thead>
         <tbody id="tableData">
         </tbody>
     </table>
     </div>
 </div>
</div>
</div>
</div>
@stop

@push('script')
    <script type="text/javascript">
//fetch
function getAllFile() {
    axios.get("{{route('image.get')}}")
    .then(response => {
       // console.log(response.data.data);
        let html = ''
          $.each(response.data.data,function (key,value) {
        html +=`<tr>
                 <th>${++key}</th>
                 <th><a class ="btn btn-sm btn-success download" data-path ="${value.path}" >Download</a></th>
                 <th><a class ="btn btn-sm btn-danger delete" data-id ="${value.id}">Delete</a></th>
             </tr>`
        })
        $('#tableData').html(html);
    })
}
getAllFile();
//download
    $('body').on('click','.download', function(e) {
        e.preventDefault();
        let path = $(this).attr('data-path');
        let data = {path:path};

        axios
            .get("{{route('image.download')}}", {params : data})
            .then(res => {
                console.log(res.data)
            })
            .catch(err =>{

            })
    });

    //delete 
    $('body').on('click','.delete',function (e) {
        e.preventDefault()
        let id = $(this).attr('data-id')
        let data = {id:id}
        axios
            .delete("{{route('image.delete')}}", {params : data})
            .then(res => {
                if(res.data == 'DELETE'){
                    alert('Data Deleted!');
                    getAllFile();
                }
            })
            .catch(err =>{

            })
        

    })
    //store
    $('#imgUploadBtn').click((e)=>{
    e.preventDefault();
    let file = document.getElementById('file').files[0]
    if(file){
       // let fileSize = file.size [ get file size]
       let fileName = file.name
       let ext = fileName.split('.').pop()
       let fileData = new FormData()
       fileData.append('file',file)
        let config = {
            headers : {'content-type' : 'multipart/form-data'},

        onUploadProgress : progressEven => {
            let size = (progressEven.total /(1024*1024)).toFixed(2)
            let loaded = (progressEven.loaded /(1024*1024)).toFixed(2)
            let left = size - loaded
            $('#uploadStatus').html('<b>Total : </b>' + size +'MB <b>Loaded : </b>' + loaded+ 'MB <b>left : </b>'+left.toFixed(2)+' MB');
        }
        }
       axios.post("{{ route('image.store') }}",fileData,config)
       .then( response =>{
        if(response.data.code == 201){
            document.getElementById('imgUploadBtn').innerText = 'Success';
            getAllFile();
            setTimeout(() =>{
                $('#uploadStatus').html('');
            },1000)
           
        }
       })
       .catch(error =>{

       })
    }else{
        alert('Filed must nit be empty!')
    }


    });
    </script>
@endpush
