<div class="table-responsive">
    <table class="table" id="payments-table">
        <thead>
            <tr>
                <th>Role</th>
        <th>Salary</th>
        <th>Number</th>
        <th>Total</th>
            </tr>
        </thead>
        <tbody>
        @foreach($payments as $payment)
            <tr>
                <td>{!! $payment->Role !!}</td>
            <td>{!! $payment->Salary !!}</td>
            <td>{!! $payment->Number !!}</td>
            <td>{!! $payment->Total !!}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
