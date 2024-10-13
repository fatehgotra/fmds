@extends('layouts.admin')
@section('title', 'Pricing')
@section('content')

<div class="container-fluid Pricing">
    <div class="page-title-box">
        <h4 class="page-title">Pricing</h4>
    </div>
    <ul class="lg-navs nav nav-pills mb-3 mt-3">
        <li class="nav-item">
            <a href="#packages" data-bs-toggle="tab" aria-expanded="true" class="nav-link rounded-0 active">
                <span>Packages</span>
            </a>
        </li>
        <li class="nav-item ms-3">
            <a href="#messages" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                <span>Messages Cost</span>
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane show active" id="packages">
            <form method="POST" id="customerForm" action="{{ route('admin.packages.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="text-dark fw-medium mt-0 mb-4">Package Details</h4>
                                <div class="mb-2">
                                    <label class="control-label">Name</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror form-lg" placeholder="Starter">
                                    @error('name')
                                    <code id="name-error" class="text-danger">{{ $message }}</code>
                                    @enderror
                                </div>

                                <div class="mb-2">
                                    <label class="control-label">Billing cycle</label>
                                    <select name="billing_cycle" class="form-control @error('billing_cycle') is-invalid @enderror form-lg">
                                        <option value="">Please select</option>
                                        <option value="yearly" @if(old('billing_cycle') == "yearly") selected @endif >Yearly</option>
                                        <option value="monthly" @if(old('billing_cycle') == "monthly") selected @endif >Monthly</option>
                                        <option value="weekly" @if(old('billing_cycle') == "weekly") selected @endif >Weekly</option>
                                        <option value="half yearly" @if(old('billing_cycle') == "half yearly") selected @endif >Half yearly</option>
                                        <option value="daily" @if(old('billing_cycle') == "daily") selected @endif >Daily</option>
                                    </select>
                                    @error('billing_cycle')
                                    <code id="billing_cycle-error" class="text-danger">{{ $message }}</code>
                                    @enderror
                                </div>

                                <div class="mb-2">
                                    <label class="control-label">Price</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text">$</span>
                                        <input type="text" name="price" value="{{ old('price') }}" class="form-control @error('price') is-invalid @enderror form-lg">
                                    </div>
                                    @error('price')
                                    <code id="price-error" class="text-danger">{{ $message }}</code>
                                    @enderror
                                </div>

                                <div class="mb-0">
                                    <label class="control-label">Status</label>
                                    <select name="status" class="form-control @error('status') is-invalid @enderror form-lg">
                                        <option value="">Please select</option>
                                        <option value="1" {{ (old('status') == 1) ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ (old('status') == 0) ? 'selected' : '' }}>In-active</option>
                                    </select>
                                    @error('status')
                                    <code id="status-error" class="text-danger">{{ $message }}</code>
                                    @enderror
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="text-dark fw-medium mt-0 mb-4">Limits</h4>
                                <div class="mb-2">
                                    <div class="form-check form-switch">
                                        <input type="checkbox" name="is_include_contacts" class="form-check-input" id="customSwitch0">
                                        <label class="form-check-label" for="customSwitch0">Unlimited Contacts</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input type="checkbox" name="is_include_numbers" class="form-check-input" id="customSwitch1">
                                        <label class="form-check-label" for="customSwitch1">Includes number</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input type="checkbox" name="is_sms_fallback" class="form-check-input" id="customSwitch2">
                                        <label class="form-check-label" for="customSwitch2">SMS Fallback</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input type="checkbox" name="is_unlimited_lists" class="form-check-input" id="customSwitch3">
                                        <label class="form-check-label" for="customSwitch3">Unlimited Lists</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input type="checkbox" name="is_unlimited_templates" class="form-check-input" id="customSwitch4">
                                        <label class="form-check-label" for="customSwitch4">Unlimited Templates</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input type="checkbox" name="is_unlimited_campaigns" class="form-check-input" id="customSwitch5">
                                        <label class="form-check-label" for="customSwitch5">Unlimited Campaigns</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input type="checkbox" name="is_unlimited_agents" class="form-check-input" id="customSwitch6">
                                        <label class="form-check-label" for="customSwitch6">Unlimited Agents</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input type="checkbox" name="is_unlimited_automations" class="form-check-input" id="customSwitch7">
                                        <label class="form-check-label" for="customSwitch7">Unlimited Automations</label>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label class="control-label">Contacts</label>
                                    <input type="number" name="no_of_contacts" value="{{ old('no_of_contacts') }}" placeholder="Contacts" class="form-control @error('no_of_contacts') is-invalid @enderror form-lg">
                                    @error('no_of_contacts')
                                    <code id="no_of_contacts-error" class="text-danger">{{ $message }}</code>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label class="control-label">Contacts Lists</label>
                                    <input type="number" name="no_of_contact_lists" placeholder="Contacts Lists" value="{{ old('no_of_contact_lists') }}" class="form-control @error('no_of_contact_lists') is-invalid @enderror form-lg">
                                    @error('no_of_contact_lists')
                                    <code id="no_of_contact_lists-error" class="text-danger">{{ $message }}</code>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label class="control-label">Message Templates</label>
                                    <input type="number" name="no_of_message_templates" placeholder="Message Templates" value="{{ old('no_of_message_templates') }}" class="form-control @error('no_of_message_templates') is-invalid @enderror form-lg">
                                    @error('no_of_message_templates')
                                    <code id="no_of_message_templates-error" class="text-danger">{{ $message }}</code>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label class="control-label">Campaigns</label>
                                    <input type="number" name="no_of_campaign" placeholder="Campaigns" value="{{ old('no_of_campaign') }}" class="form-control @error('no_of_campaign') is-invalid @enderror form-lg">
                                    @error('no_of_campaign')
                                    <code id="no_of_campaign-error" class="text-danger">{{ $message }}</code>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label class="control-label">Agents</label>
                                    <input type="number" name="no_of_team_agent" placeholder="Agents" value="{{ old('no_of_team_agent') }}" class="form-control @error('no_of_team_agent') is-invalid @enderror form-lg">
                                    @error('no_of_team_agent')
                                    <code id="no_of_team_agent-error" class="text-danger">{{ $message }}</code>
                                    @enderror
                                </div>
                                <div class="mb-0">
                                    <label class="control-label">Automations</label>
                                    <input type="number" name="no_of_automations" placeholder="Automations" value="{{ old('no_of_automations') }}" class="form-control @error('no_of_automations') is-invalid @enderror form-lg">
                                    @error('no_of_automations')
                                    <code id="no_of_automations-error" class="text-danger">{{ $message }}</code>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="float-end">
                            <a href="{{ route('admin.pricing.index') }}" class="btn btn-primary">Back</a>
                            <input type="submit" value="Create" class="btn btn-primary ms-2">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="tab-pane" id="messages">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div><h3 class="text-dark">Message Costs</h3></div>
                        <div><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#msgCost">Add</button></div>
                    </div>
                </div>
                <div class="Ctable-responsive">
                    <table class="table table-centered w-100 dt-responsive">
                        <thead class="table-light">
                            <tr>
                                <th>Country</th>
                                <th>Code</th>
                                <th>Local SMS</th>
                                <th>Global SMS</th>
                                <th>Marketing</th>
                                <th>Service</th>
                                <th>Utility</th>
                                <th>Auth</th>
                                <th class="text-end">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>South Africa</td>
                                <td>+27</td>
                                <td>$0.01</td>
                                <td>$1.20</td>
                                <td>$0.04</td>
                                <td>$0.03</td>
                                <td>$0.02</td>
                                <td>$0.02</td>
                                <td class="table-action text-end">
                                    <div class="dropdown float-end">
                                        <a href="javascript:void(0);" class="dropdown-toggle arrow-none card-drop action-icon" data-bs-toggle="dropdown" aria-expanded="false">
                                            <img src="{{ asset('assets/images/company/icons/more.png') }}" alt="smile" class="img-fluid" width="24" height="24">
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="javascript:void(0)" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#msgCost">Edit</a>
                                            <a href="javascript:void(0);" class="dropdown-item">Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>India</td>
                                <td>+91</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td class="table-action text-end">
                                    <div class="dropdown float-end">
                                        <a href="javascript:void(0);" class="dropdown-toggle arrow-none card-drop action-icon" data-bs-toggle="dropdown" aria-expanded="false">
                                            <img src="{{ asset('assets/images/company/icons/more.png') }}" alt="smile" class="img-fluid" width="24" height="24">
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="javascript:void(0)" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#msgCost">Edit</a>
                                            <a href="javascript:void(0);" class="dropdown-item">Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div id="msgCost" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="msgCostLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="standard-modalLabel">Message Cost</h4>
                    <button type="button" class="btn-link" data-bs-dismiss="modal" aria-hidden="true">X</button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="form-group mb-2">
                            <label class="control-label">Country</label>
                            <select name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror form-lg">
                                <option value="">Please select</option>
                                <option value="">South Africa</option>
                                <option value="">United States</option>
                                <option value="">India</option>
                            </select>
                            @error('title')
                            <code id="title-error" class="text-danger">{{ $message }}</code>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group mb-2">
                                    <label class="form-label">Local SMS</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text">$</span>
                                        <input type="text" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror form-lg">
                                        @error('title')
                                        <code id="title-error" class="text-danger">{{ $message }}</code>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group mb-2">
                                    <label class="form-label">Global SMS</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text">$</span>
                                        <input type="text" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror form-lg">
                                        @error('title')
                                        <code id="title-error" class="text-danger">{{ $message }}</code>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <label class="form-label">Whatsapp Marketing</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text">$</span>
                                <input type="text" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror form-lg">
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <label class="form-label">Whatsapp Service</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text">$</span>
                                <input type="text" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror form-lg">
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <label class="form-label">Whatsapp Utility</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text">$</span>
                                <input type="text" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror form-lg">
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <label class="form-label">Whatsapp Authentication</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text">$</span>
                                <input type="text" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror form-lg">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-pre">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
