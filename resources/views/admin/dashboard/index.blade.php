@extends('admin.master')

@section('contact')
    <div class="dashboard">
        <div class="stats">
            <div class="stat-item">
                <h4>Total Users</h4>
            
            </div>
            <div class="stat-item">
                <h4>Total Sales</h4>
             
            </div>
        </div>

        <div class="chart-container">
            <h3>Dashboard Chart</h3>
            <canvas id="myChart"></canvas>
        </div>

        <div class="booking-table">
            <h3>Booking Details</h3>
            <table>
                <thead>
                    <tr>
                        <th>Service Name</th>
                        <th>Car Size</th>
                        <th>Price</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                 
                </tbody>
            </table>
        </div>
    </div>

    
@endsection
