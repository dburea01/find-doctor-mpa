<div class="card">

    <div class="card-header">
        Location (to translate)
    </div>

    <div class="card-body">

        <div class="row">
            <div class="col-6">
                <p>
                    @if( $location->address1 ) {{ $location->address1 }} @endif
                    @if( $location->address2 ) <br>{{ $location->address2 }} @endif
                    @if( $location->address3 ) <br>{{ $location->address3 }} @endif
                    <br>
                    {{ $location->city->zip_code }} - {{ $location->city->name }}
                </p>

                <p>
                    @foreach ($location->location_contacts as $contact)
                    {{ $contact->mean_contact }} : {{ $contact->comment }}<br>

                    @endforeach
                </p>
            </div>

            <div class="col-6">
                <img src="{{ asset('img/carte_location.png') }}" style="width:250px;height:250px" />
            </div>
        </div>

    </div>
</div>