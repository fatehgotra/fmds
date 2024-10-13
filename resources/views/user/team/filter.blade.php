<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h4 id="offcanvasRightLabel" class="page-title text-dark">Filter Member</h4>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="row">
            <form id="teamFilterForm"  action="{{ route('user.team.index') }}">
               <input type="hidden" name="filter_process" value="1">

                <div class="form-floating mb-3 col-sm-12">
                    <input type="text" name="filter_name" value="{{ request()->get('filter_name') }}" class="form-control" placeholder="Enter Name">
                    <label for="floatingInput">Name</label>
                </div>

                <div class="form-floating mb-3 col-sm-12">
                    <input type="text" name="filter_phone" value="{{ request()->get('filter_phone') }}" class="form-control" placeholder="Enter Name">
                    <label for="floatingInput">Phone</label>
                </div>

                <div class="form-floating mb-3 col-sm-12">
                    <input type="text" name="filter_email" value="{{ request()->get('filter_email') }}" class="form-control" placeholder="Enter Name">
                    <label for="floatingInput">Email</label>
                </div>


                <div class="form-floating mb-3 col-sm-12">
                    <select class="form-select" name="filter_status">
                        <option value="1" @if(request()->get('filter_status') === 1) selected @endif>Active</option>
                        <option value="0" @if(request()->get('filter_status') === 0) selected @endif>Inactive </option>
                    </select>
                    <label for="floatingInput">Status</label>
                </div>


                <div class="form-floating  mb-3 col-sm-12">
                    <button type="submit" class="btn btn-primary w-100">Filter</button>
                </div>

            </form>

        </div>

    </div>
</div>
