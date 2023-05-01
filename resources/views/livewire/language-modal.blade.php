<div class="modal fade" id="country-selector" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content country-select-modal">
            <div class="modal-header">
                <h6 class="modal-title">{{ __('Choose a language') }}</h6><button aria-label="Close" class="btn-close"
                    data-bs-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <ul class="row row-sm p-3">
                    @foreach (config('app.available_locale') as $locale)
                        <li class="col-lg-4 mb-2" id="languageTags">
                            <a href="#" wire:click.prevent="changeLanguage('{{ $locale }}')"
                                class="btn btn-country btn-lg btn-block {{ config('app.locale') == $locale ? 'active' : '' }}">
                                <span class="country-selector"><img alt="english"
                                        src="{{ asset('assets/images/flags/' . $locale . '.svg') }}"
                                        class="me-2 language"></span>{{ strtoupper($locale) }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>