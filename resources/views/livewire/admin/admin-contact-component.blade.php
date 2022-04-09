<div>
    <div class="card">
        <div class="card-body">
          <div class="row">
                <div class="col-lg-4 col-md-3 col-sm-12">

                </div>
                <div class="col-lg-5 col-md-4 col-sm-12">
    
                </div>
                <table class="table table-striped table-sm table-bordered">
                    <thead>
                      <tr>
                        <th width="10%">Name</th>
                        <th width="10%">Email</th>
                        <th width="10%">Phone</th>
                        <th width="29%">Comment</th>
                        <th width="10%">Created at</th>
 
                      </tr>
                    </thead>
                    <tbody>
                        @if (count($contacts) > 0)
                          @foreach ($contacts as $contact)
                            <tr>
                              <td>{{ $contact->name }}</td>
                              <td>{{ $contact->email }}</td>
                              <td>{{ $contact->phone }}</td>
                              <td>{{ $contact->comment }}</td>
                              <td>{{ date('M d,Y', strtotime($contact->created_at)) }}</td>
                          @endforeach
                    
                        @else
                          <tr>
                            <td colspan="8">
                              <h4 class="text-center">Table is empty</h4>
                            </td>
                          </tr>
                        @endif
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>
