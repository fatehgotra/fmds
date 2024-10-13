<div class="card-body">
    <div class="filter">
        <form>
            <div class="row">
                <div class="col-sm-3 col-12 mb-2">
                    <label for="label" class="form-label">Contact</label>
                    <input type="text" class="form-control" name="contact"
                        placeholder="Enter Contact">
                </div>
                <div class="col-sm-3 col-12 mb-2">
                    <label for="label" class="form-label">Reminder</label>
                    <input type="text" class="form-control" name="reminder"
                        placeholder="Enter Reminder">
                </div>
                <div class="col-sm-3 col-12 mb-2">
                    <label for="label" class="form-label">Status</label>
                    <select id="" class="form-select" name="status">
                        <option selected>Select Status</option>
                        <option value="read">Read</option>
                        <option value="unread">Unread</option>
                    </select>
                </div>

                <div class="col-sm-3 col-12 mb-2">
                    <label for="label" class="form-label">Team Member</label>
                    <input type="text" class="form-control" name="member"
                        placeholder="Enter Member Name">
                </div>


            </div>
            <div class="d-flex justify-content-end filterBtn mt-2">
                <button type="button" class="btn btn-link text-muted me-2">Clear Filters</button>
                <button type="button" class="btn btn-primary">Filter</button>
            </div>
        </form>
    </div>

    <div class="row">
        <div class="col-lg-3 col-12 mt-3">

            <select id="bulk-action" name="bulk-action" class="form-select">
                <option selected>Bulk Action</option>
                <option value="">Mark as Read</option>
                <option value="">Delete</option>
            </select>
        </div>
    </div>
</div> <!-- end card-body -->