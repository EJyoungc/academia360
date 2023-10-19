
    <!-- Be present above all else. - Naval Ravikant -->

    @props(['status'=>true ,'title'=>'','slot'=>''])
    <div class="modal fade show @if($status) d-block @endif" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl " role="document">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                    <h5 class="modal-title">{{ $title }}</h5>
                        <button type="button" wire:click.prevent='cancel' class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>


