@include('layout.header')
<head>
    <!--  <script src="https://cdn.jsdelivr.net/npm/face-api.js"></script> -->
  <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<div class="wrapper">
    <div class="page-wrapper">
        <div class="page-content">

            <div class="row">

                <div class="col-xl-10 mx-auto">
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                        <div class="breadcrumb-title pe-3"><a href="{{ url('staff') }}">Staff</a></div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><i class="bx bx-user"></i>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Staff</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <hr />
                    <h6 class="mb-0 text-uppercase"></h6>

                    <div class="card">
                        <div class="card-body">
                            <div class="p-4 border rounded">
                                <form class="row g-3 needs-validation" action="{{ route('addstaff.store') }}"
                                    method="post" enctype="multipart/form-data" novalidate>
                                    @csrf
                                    <div class="col-md-6">
                                        <label for="validationCustom01" class="form-label">First name</label>
                                        <div class="input-group"> <span class="input-group-text"
                                                id="inputGroupPrepend"><i class="bx bx-user"></i></span>
                                            <input type="text" name="name" class="form-control" id="validationCustom01"
                                                value="" required>
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="validationCustom02" class="form-label">Last name</label>
                                        <div class="input-group"> <span class="input-group-text"
                                                id="inputGroupPrepend"><i class="bx bx-user"></i></span>
                                            <input type="text" name="name" class="form-control" id="validationCustom02"
                                                value="" required>
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="validationCustomUsername" class="form-label">Username</label>
                                        <div class="input-group has-validation"> <span class="input-group-text"
                                                id="inputGroupPrepend"><i class="bx bx-user"></i></span>
                                            <input type="text" name="username" class="form-control" id="validationCustomUsername"
                                                aria-describedby="inputGroupPrepend" required>
                                            <div class="invalid-feedback">Please choose a username.</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="validationCustomUsername" class="form-label">Email</label>
                                        <div class="input-group has-validation"> <span class="input-group-text"
                                                id="inputGroupPrepend">@</span>
                                            <input type="email" name="email" class="form-control" id="validationCustomUsername"
                                                aria-describedby="inputGroupPrepend" required>
                                            <div class="invalid-feedback">Please choose a username.</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="validationCustomUsername" class="form-label">Phone
                                            Number</label>
                                        <div class="input-group"> <span class="input-group-text"
                                                id="inputGroupPrepend"><i class="bx bx-phone"></i></span>
                                            <input type="text" name="mobileNo"  class="form-control" id="validationCustomUsername"
                                                aria-describedby="inputGroupPrepend" required>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="validationCustomUsername" class="form-label">Image</label>
                                        <input  type="file"  id="imageUpload" name="filename" aria-label="default input example"
                                         required>
                                           <img id="uploadedImage" style="display: none;">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="validationCustom05" class="form-label">Password</label>
                                        <div class="input-group"> <span class="input-group-text"
                                                id="inputGroupPrepend"><i class="bx bx-lock"></i></span>
                                            <input type="password" name="password" class="form-control" id="validationCustom05"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="validationCustom05" class="form-label">Confirm Password</label>
                                        <div class="input-group"> <span class="input-group-text"
                                                id="inputGroupPrepend"><i class="bx bx-lock"></i></span>
                                            <input type="password" name="confirmpassword" class="form-control" id="validationCustom05"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-12 btn-align">
                                        <button  class="btn btn-primary" type="submit">Add Staff</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

   
  
   

    <script>
       
     document.getElementById('imageUpload').addEventListener('change', handleImage);

        async function handleImage(event) {
            const input = event.target;
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = async function(e) {
                    const image = document.getElementById('uploadedImage');
                    image.src = e.target.result;
                    image.style.display = 'block';

                    // Ensure the image has loaded before running face detection
                    image.onload = async () => {
                        await detectFaces(image);
                    };
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        async function detectFaces(image) {
            try {
                // Use faceapi imported from app.js
                const detections = await faceapi.detectAllFaces(image)
                    .withFaceLandmarks()
                    .withFaceDescriptors();
                console.log(detections[0].descriptor);
                let descriptor=detections[0].descriptor;
            } catch (error) {
                console.error('Error during face detection:', error);
            }
        }

    



    </script>
