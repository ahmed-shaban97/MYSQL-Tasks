<!-- create.php -->
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-4">
                    <h3 class="text-center mb-4"> Create New Blog</h3>

                    <form method="POST" action="index.php?page=store-blog" enctype="multipart/form-data">
                        <!-- Title -->
                        <div class="mb-3">
                            <label for="title" class="form-label fw-bold">Blog Title</label>
                            <input type="text" class="form-control rounded-3" id="title" placeholder="Enter blog title"
                                name="title">
                        </div>

                        <!-- Image -->
                        <div class="mb-3">
                            <label for="image" class="form-label fw-bold">Blog Image</label>
                            <input type="file" class="form-control rounded-3" id="image" accept="image/*" name="image">
                        </div>

                        <!-- Content -->
                        <div class="mb-3">
                            <label for="content" class="form-label fw-bold">Content</label>
                            <textarea class="form-control rounded-3" id="content" rows="5"
                                placeholder="Write your blog content here..." name="content"></textarea>
                        </div>

                        <!-- Submit -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary rounded-pill py-2 shadow">
                                Publish Blog
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>