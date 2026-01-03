@extends('layouts/masterPlatinum')
@section('content')

<style>
    section{
        position: relative;
        min-height: 120px;
        padding: 0 16px;
        margin-top: 30px;
    }

    /* Header */
    .page-header{
        max-width: 1000px;
        margin: 0 auto 14px auto;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        flex-wrap: wrap;
    }

    .titleText{
        font-size: 24px;
        font-weight: 800;
        margin: 0;
        letter-spacing: .2px;
    }

    .subtitleText{
        margin: 0;
        font-size: 13px;
        color: #6b7280;
    }

    /* Success alert */
    .success-message{
        max-width: 1000px;
        margin: 0 auto 12px auto;
    }

    .alert-success-soft{
        background: rgba(46, 204, 113, 0.12);
        border: 1px solid rgba(46, 204, 113, 0.25);
        color: #1e8449;
        padding: 10px 12px;
        border-radius: 10px;
        font-weight: 600;
        text-align: center;
    }

    /* Card */
    .container-card{
        border: 1px solid #eef0f3;
        background-color: #ffffff;
        max-width: 1000px;
        width: 100%;
        padding: 18px;
        margin: 0 auto 1rem auto;
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    }

    /* Table */
    .table-wrap{
        width: 100%;
        overflow-x: auto;
    }

    table{
        width: 100%;
        border-collapse: collapse;
        min-width: 720px;
    }

    thead th{
        text-align: left;
        font-size: 12px;
        color: #6b7280;
        text-transform: uppercase;
        letter-spacing: .7px;
        padding: 12px 12px;
        border-bottom: 1px solid #eef0f3;
        background: #f9fafb;
    }

    tbody td{
        padding: 14px 12px;
        border-bottom: 1px solid #eef0f3;
        vertical-align: middle;
    }

    tbody tr:hover{
        background: #fbfdff;
    }

    .col-no{
        width: 80px;
        text-align: center;
        font-weight: 700;
        color: #111827;
    }

    .title-cell{
        font-weight: 600;
        color: #111827;
    }

    .actions-cell{
        width: 320px;
    }

    /* Buttons */
    .action-buttons-container{
        display: flex;
        justify-content: flex-start;
        align-items: center;
        gap: 10px;
        flex-wrap: wrap;
    }

    .action-button{
        border: 1px solid transparent;
        cursor: pointer;
        padding: 8px 12px;
        border-radius: 10px;
        font-weight: 700;
        font-size: 13px;
        transition: .15s ease-in-out;
        min-width: 88px;
    }

    .action-button:hover{
        transform: translateY(-1px);
        opacity: .95;
    }

    .view{
        background-color: #04AA6D;
        border-color: #04AA6D;
        color: #fff;
    }

    .edit{
        background-color: #2563eb;
        border-color: #2563eb;
        color: #fff;
    }

    .delete{
        background-color: #dc2626;
        border-color: #dc2626;
        color: #fff;
    }

    /* Empty state */
    .empty-state{
        text-align: center;
        padding: 28px 10px;
        background: #f9fafb;
        border: 1px dashed #d1d5db;
        border-radius: 12px;
        color: #6b7280;
        font-weight: 600;
    }

    /* Responsive */
    @media (max-width: 768px){
        .page-header{
            align-items: flex-start;
        }
        table{
            min-width: 620px;
        }
        .actions-cell{
            width: auto;
        }
        .action-buttons-container{
            justify-content: flex-start;
        }
    }
</style>

<section>

    <div class="page-header">
        <div>
            <p class="titleText">Research Information</p>
            <p class="subtitleText">View, edit, delete, or open your saved research records.</p>
        </div>
    </div>

    <div class="success-message">
        @if(session()->has('success'))
            <div class="alert-success-soft">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <div class="container-card">
        @if($data->isEmpty())
            <div class="empty-state">
                There is no listing.
            </div>
        @else
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th style="width: 10%;">No</th>
                            <th style="width: 60%;">Research Information Title</th>
                            <th style="width: 30%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $counter = 1; @endphp
                        @foreach ($data as $research)
                            <tr>
                                <td class="col-no">{{ $counter }}</td>
                                <td class="title-cell">{{ $research->RI_title }}</td>
                                <td class="actions-cell">
                                    <div class="action-buttons-container">
                                        <a href="{{ url('platinum/research/editResearch/' . $research->RI_ID) }}">
                                            <button class="action-button edit" type="button">Edit</button>
                                        </a>

                                        <a href="{{ url('platinum/research/deleteResearch/' . $research->RI_ID) }}">
                                            <button class="action-button delete" type="button">Delete</button>
                                        </a>

                                        <a href="{{ url('platinum/research/viewResearch/' . $research->RI_ID) }}">
                                            <button class="action-button view" type="button">View</button>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @php $counter++; @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

</section>

@endsection
