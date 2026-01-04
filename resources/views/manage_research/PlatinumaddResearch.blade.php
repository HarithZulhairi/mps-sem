@extends('layouts/masterPlatinum')
@section('content')

<style>
    /* Layout */
    .form-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 50px;
        padding: 0 16px;
    }

    /* Header */
    .form-title {
        width: 100%;
        max-width: 780px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 14px;
    }

    .form-title h3 {
        margin: 0;
        font-size: 22px;
        font-weight: 700;
        letter-spacing: 0.2px;
    }

    .badge-soft {
        background: rgba(46, 204, 113, 0.12);
        color: #1e8449;
        border: 1px solid rgba(46, 204, 113, 0.25);
        padding: 6px 10px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 600;
        white-space: nowrap;
    }

    /* Card */
    .form-content {
        background: #ffffff;
        padding: 22px;
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        width: 100%;
        max-width: 780px;
        border: 1px solid #eef0f3;
    }

    /* Grid */
    .details-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 14px;
        margin-top: 10px;
    }

    .detail-row {
        background: #f9fafb;
        border: 1px solid #eef0f3;
        border-radius: 10px;
        padding: 12px 14px;
    }

    .detail-row.full {
        grid-column: 1 / -1;
    }

    .detail-label {
        font-size: 12px;
        font-weight: 700;
        color: #6b7280;
        margin-bottom: 6px;
        text-transform: uppercase;
        letter-spacing: 0.6px;
    }

    .detail-input {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #d1d5db;
        border-radius: 10px;
        font-size: 14px;
        outline: none;
        background: #fff;
    }

    .detail-input:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
    }

    .required-star {
        color: #dc2626;
        margin-left: 4px;
    }

    /* Actions */
    .actions {
        display: flex;
        gap: 10px;
        justify-content: flex-end;
        margin-top: 16px;
        flex-wrap: wrap;
    }

    .btn-soft {
        border-radius: 10px;
        padding: 10px 14px;
        font-weight: 600;
        border: 1px solid transparent;
        cursor: pointer;
    }

    .btn-primary.btn-soft {
        background: #2563eb;
        border-color: #2563eb;
        color: #fff;
    }

    .btn-primary.btn-soft:hover {
        background: #1d4ed8;
        border-color: #1d4ed8;
        color: #fff;
    }

    .btn-secondary.btn-soft {
        background: #111827;
        border-color: #111827;
        color: #fff;
        text-decoration: none;
        display: inline-block;
    }

    .btn-secondary.btn-soft:hover {
        background: #374151;
        border-color: #374151;
        color: #fff;
        text-decoration: none;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .details-grid {
            grid-template-columns: 1fr;
        }
        .form-title {
            flex-direction: column;
            align-items: flex-start;
            gap: 8px;
        }
        .actions {
            justify-content: stretch;
        }
        .actions button,
        .actions a {
            flex: 1;
            text-align: center;
        }
    }
</style>

<div class="form-container">

    <div class="form-title">
        <h3>Please Add Your Research Information</h3>
        <span class="badge-soft">Research Management</span>
    </div>

    <div class="form-content">

        @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif

        <form method="post" action="{{ route('manage_research.saveResearch') }}">
            @csrf

            <div class="details-grid">

                <div class="detail-row full">
                    <div class="detail-label">Title <span class="required-star">*</span></div>
                    <input type="text" id="title" name="RI_title" class="detail-input" placeholder="e.g., Intelligent Student Performance Monitoring System" required>
                </div>

                <div class="detail-row full">
                    <div class="detail-label">Abstract <span class="required-star">*</span></div>
                    <input type="text" id="abstract" name="RI_abstract" class="detail-input" placeholder="Briefly describe the research..." required>
                </div>

                <div class="detail-row">
                    <div class="detail-label">Research Area <span class="required-star">*</span></div>
                    <input type="text" id="area" name="RI_area" class="detail-input" placeholder="e.g., Artificial Intelligence" required>
                </div>

                <div class="detail-row">
                    <div class="detail-label">Budget <span class="required-star">*</span></div>
                    <input type="text" id="budget" name="RI_budget" class="detail-input" placeholder="e.g., 5000" required>
                </div>

                <div class="detail-row full">
                    <div class="detail-label">Objective <span class="required-star">*</span></div>
                    <input type="text" id="objective" name="RI_objective" class="detail-input" placeholder="What is the main goal of this research?" required>
                </div>

                <div class="detail-row full">
                    <div class="detail-label">Methodology <span class="required-star">*</span></div>
                    <input type="text" id="method" name="RI_methodology" class="detail-input" placeholder="e.g., Data collection, preprocessing, model training, evaluation" required>
                </div>

                <div class="detail-row full">
                    <div class="detail-label">Research Background <span class="required-star">*</span></div>
                    <input type="text" id="background" name="RI_background" class="detail-input" placeholder="Why is this research needed?" required>
                </div>

                <div class="detail-row">
                    <div class="detail-label">Start Date <span class="required-star">*</span></div>
                    <input type="date" id="start_date" name="start_date" class="detail-input" required>
                </div>

                <div class="detail-row">
                    <div class="detail-label">Expected End Date <span class="required-star">*</span></div>
                    <input type="date" id="end_date" name="end_date" class="detail-input" required>
                </div>

            </div>

            <div class="actions">
                <button type="submit" class="btn btn-primary btn-soft">Submit</button>
                <a href="{{ url('platinum/research/listResearch') }}" class="btn btn-secondary btn-soft">Back</a>
            </div>

        </form>
    </div>
</div>

@endsection
