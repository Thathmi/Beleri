<div class="row">
                                    <div class="col-12">

                                        <div class="row g-1">
                                            <div class="col-12 col-lg-6 d-grid">
                                                <a href="#" class="btn btn-success fs btn-sm">Update</a>
                                            </div>
                                            <div class="col-12 col-lg-6 d-grid">
                                                <a href="#" class="btn btn-danger fs btn-sm" onclick="deletemodal(<?php echo $productImage['id'] ?>);">Delete</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="deleteModal<?php echo $productImage['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title fw-bold text-warning" id="exampleModalLabel">Warning</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you want to delete this product 
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                <button type="button" class="btn btn-primary" onclick="deleteProduct(<?php echo $productImage['id'] ?>);">Yes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal -->



















                <div class="row">
                                                                <div class="col-12">

                                                                    <div class="row g-1">
                                                                        <div class="col-12 col-lg-6 d-grid">
                                                                            <a href="#" class="btn btn-success fs btn-sm" onclick="sendid(<?php echo $productImage['id'] ?>);">Update</a>
                                                                        </div>
                                                                        <div class="col-12 col-lg-6 d-grid">
                                                                            <a href="#" class="btn btn-danger fs btn-sm" onclick="deletemodal(<?php echo $productImage['id'] ?>);">Delete</a>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Modal -->
                                            <div class="modal fade" id="deleteModal<?php echo $productImage['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title fw-bold text-warning" id="exampleModalLabel">Warning</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you want to delete this product
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                                            <button type="button" class="btn btn-primary" onclick="deleteProduct(<?php echo $productImage['id'] ?>);">Yes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- modal -->
