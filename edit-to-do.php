
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editToDoModal<?php echo $note['noteid']; ?>">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
    </svg>
</button>


<div class="modal fade" id="editToDoModal<?php echo $note['noteid']; ?>" tabindex="-1" aria-labelledby="editToDoModalLabel<?php echo $note['noteid']; ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editToDoModalLabel<?php echo $note['noteid']; ?>">Edit Note</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="">
                    <div class="mb-3">
                        <label for="Name<?php echo $note['noteid']; ?>" class="form-label">Name</label>
                        <input type="text" class="form-control" id="Name<?php echo $note['noteid']; ?>" name="Name" value="<?php echo $note['Name']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="Contents<?php echo $note['noteid']; ?>" class="form-label">Contents</label>
                        <input type="text" class="form-control" id="Contents<?php echo $note['noteid']; ?>" name="Contents" value="<?php echo $note['Contents']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="DueDate<?php echo $note['Due Date']?>" class="form-label">Due Date</label>
                        <input type="date" id="DueDate<?php echo $note['Due Date']?>" name="Due Date" value="<?php echo date('Y-m-d',strtotime($note['Due Date']))?>">
                    </div>
                    <div class="mb-3">
                        <label for="Priority<?php echo $note['Priority']?>" class="form-label">Priority Level <span class="bg-secondary border border-1 border-dark"><span class="text-success">1</span>-<span class="text-danger">10</span></span></label>
                        <input type="text" class="form-control" id="Priority<?php echo $note['Priority']?>" name="Priority" value="<?php echo $note['Priority']?>">
                    </div>

                    <input type="hidden" name="cid" value="<?php echo $note['noteid']; ?>">
                    <input type="hidden" name="actionType" value="Edit">
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>