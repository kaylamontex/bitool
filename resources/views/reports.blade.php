@extends('layouts.app')

@section('app-head')
<title>BI Tool - Reports</title>
@endsection

@section('app-content')
<div class="breadcrumb-default">
    <div class="title"><h3>Reports</h3></div>
    <div class="items">
        <span><a href="{{ url('/dashboard') }}">Home</a></span>
        <span><i class="fas fa-chevron-right"></i></span>
        <span>Reports</span>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div id="generate-reports" class="card">
            <div class="card-header"><h5>Generate a report</h5></div>
            <div class="card-body report-form">
                <div class="meta-data">
                    <div id="user_id_token">{{ $user_id_token }}</div>
                    <div id="user_email">{{ $user_email }}</div>
                </div>
                <section v-if="available_reports_errored">
                    <p>We're sorry, we're not able to retrieve reports at the moment, please try back later</p>
                </section>
                <section v-else>
                    <div class="form-group">
                        <label for="report-type">Select report type</label>
                        <select v-if="available_reports_loading" class="form-control">
                            <option>Loading...</option>
                        </select>
                        <select v-else id="report-type" name="report_type" class="form-control" v-model="report_type" @change="onReportsChange()">
                            <option value="">Please select</option>
                            <template v-for="report in available_reports">
                                <!-- <option v-for="report in available_reports" v-bind:value="report.exhibitor_id">@{{ report.exhibitor_id }}</option> -->
                                <option v-for="(user, index) in report.users" v-bind:value="user.first_name">@{{ user.first_name }}</option>
                            </template>
                        </select>
                    </div>
                    <section v-if="available_shows_shown">
                        <section v-if="available_shows_errored">
                            <p>We're sorry, we're not able to retrieve this report for any shows at the moment, please try back later</p>
                        </section>
                        <section v-else>
                            <div class="form-group">
                                <label for="report-show">Select show</label>
                                <select v-if="available_shows_loading" class="form-control">
                                    <option>Loading...</option>
                                </select>
                                <select v-else id="report-show" name="report_show" class="form-control" v-model="report_show" @change="onShowsChange()">
                                    <option value="">Please select</option>
                                    <template v-for="report in available_shows">
                                        <option v-for="(user, index) in report.users" v-bind:value="user.last_name">@{{ user.last_name }}</option>
                                    </template>
                                </select>
                            </div>
                            <section v-if="process_report_button_shown">
                                <button v-on:click="processReport" type="button" class="btn btn-primary">Process Report</button>
                            </section>
                        </section>
                    </section>
                </section>
            </div>
        </div>
    </div>
</div>
@endsection
