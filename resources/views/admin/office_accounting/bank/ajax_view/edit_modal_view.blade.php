<form id="edit_bank_form" action="{{ route('admin.office.account.bank.update', $bank->id) }}" method="POST">
        @csrf
        <div class="form-group row">
            <div class="col-sm-12">
                <label for="name"><b>Bank Name</b> : </label>
                <input type="text" class="form-control" id="e_name"  value="{{ $bank->bank_name }}" name="name">
                <span class="error e_error_name"></span>
            </div>
        </div>
    
        <div class="form-group text-right">
            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal" aria-label="">Close</button>
            <button type="button" class="btn btn-sm loading_button btn-blue">Loading...</button>
            @if (json_decode($userPermits->office_accounts_module, true)['bank']['edit'] == 1)
                <button type="submit" class="btn btn-blue btn-sm submit_button">Update</button>
            @endif
        </div>
    </form>

    <script type="text/javascript">
        $(document).ready(function () {
            $('.loading_button').hide();
        });
    </script>