@extends('layouts.guest')
@section('title', 'Remove Background | NexCodeForge')

@section('content')

    <style>
        .upload-box {
            width: 420px;
            margin: auto;
            padding: 40px;
            background: white;
            border-radius: 15px;
            border: 2px dashed #6c63ff;
            cursor: pointer;
            transition: .3s;
        }

        .upload-box.dragover {
            background: #eceaff;
        }

        .upload-box img {
            width: 100%;
            margin-top: 20px;
            border-radius: 10px;
        }

        #preview {
            display: none;
        }

        .loader {
            display: none;
            margin-top: 20px;
            font-size: 18px;
            color: #6c63ff;
        }

        .btn {
            margin-top: 20px;
            padding: 10px 18px;
            background: #6c63ff;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        /* Modal */
        .modal-bg {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, .5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background: white;
            padding: 30px;
            width: 420px;
            border-radius: 12px;
            text-align: center;
        }

        .modal-content img {
            width: 100%;
            border-radius: 10px;
        }
    </style>
    <!-- page-title -->
    <div class="prt-page-title-row">
        <div class="prt-page-title-row-inner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="prt-page-title-row-heading">
                            <div class="banner-vertical-block"></div>
                            <div class="page-title-heading">
                                <h2 class="title">Remove Background</hz>
                            </div>
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="{{ route('home') }}">Home</a>
                                </span>
                                <span class="action">Remove Background</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page-title end -->

    <!-- site-main start -->
    <div class="site-main">
        <section class="prt-row about-section01 clearfix">
            <div class="container">
                <!-- Upload Box -->
                <div class="upload-box" id="dropArea">
                    <h3>Drop Image Here</h3>
                    <p>or Click to Upload</p>
                    <input type="file" id="fileInput" hidden accept="image/*">
                    <img id="preview" />
                </div>

                <button class="btn" id="processBtn" style="display:none;">Remove Background</button>

                <div class="loader" id="loading">Processing... Please wait.</div>

                <!-- Modal -->
                <div class="modal-bg" id="resultModal">
                    <div class="modal-content">
                        <h3>Background Removed</h3>
                        <img id="outputImg">
                        <br><br>
                        <button class="btn" id="downloadBtn">Download PNG</button>
                    </div>
                </div>

            </div>
        </section>

    </div>
    <!-- site-main end-->

    <script>
        const dropArea = document.getElementById("dropArea");
        const fileInput = document.getElementById("fileInput");
        const preview = document.getElementById("preview");
        const processBtn = document.getElementById("processBtn");
        const loading = document.getElementById("loading");
        const modal = document.getElementById("resultModal");
        const outputImg = document.getElementById("outputImg");
        const downloadBtn = document.getElementById("downloadBtn");

        let selectedFile = null;

        // Drag & Drop Events
        dropArea.addEventListener("click", () => fileInput.click());

        dropArea.addEventListener("dragover", e => {
            e.preventDefault();
            dropArea.classList.add("dragover");
        });

        dropArea.addEventListener("dragleave", () => {
            dropArea.classList.remove("dragover");
        });

        dropArea.addEventListener("drop", e => {
            e.preventDefault();
            dropArea.classList.remove("dragover");
            selectedFile = e.dataTransfer.files[0];
            showPreview(selectedFile);
        });

        fileInput.addEventListener("change", e => {
            selectedFile = e.target.files[0];
            showPreview(selectedFile);
        });

        function showPreview(file) {
            preview.src = URL.createObjectURL(file);
            preview.style.display = "block";
            processBtn.style.display = "inline-block";
        }

        // Process Image
        processBtn.addEventListener("click", () => {
            if (!selectedFile) return;

            loading.style.display = "block";
            processBtn.style.display = "none";

            let formData = new FormData();
            formData.append("image", selectedFile);
            formData.append("_token", "{{ csrf_token() }}");

            fetch("/remove-bg", {
                    method: "POST",
                    body: formData
                })
                .then(async response => {
                    loading.style.display = "none";

                    if (!response.ok) {
                        alert("Background removal failed!");
                        return;
                    }

                    let blob = await response.blob();
                    let url = URL.createObjectURL(blob);

                    // Show modal preview
                    outputImg.src = url;
                    modal.style.display = "flex";

                    // Auto-download
                    downloadBtn.onclick = () => {
                        let a = document.createElement("a");
                        a.href = url;
                        a.download = "background_removed.png";
                        a.click();
                    };

                })
                .catch(err => {
                    loading.style.display = "none";
                    alert("Error: " + err);
                });
        });

        // Close modal by clicking outside
        modal.addEventListener("click", e => {
            if (e.target === modal) modal.style.display = "none";
        });
    </script>

@endsection


