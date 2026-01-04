@extends('layouts.masterPlatinum')

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

    /* Grid rows */
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

    .detail-value {
        font-size: 14px;
        color: #111827;
        line-height: 1.5;
        word-break: break-word;
        white-space: pre-wrap;
        margin: 0;
    }

    /* Buttons */
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

    .btn-danger.btn-soft {
        background: #dc2626;
        border-color: #dc2626;
        color: #fff;
    }

    .btn-danger.btn-soft:hover {
        background: #b91c1c;
        border-color: #b91c1c;
        color: #fff;
    }

    .btn-secondary.btn-soft {
        background: #111827;
        border-color: #111827;
        color: #fff;
    }

    .btn-secondary.btn-soft:hover {
        background: #374151;
        border-color: #374151;
        color: #fff;
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
        .actions a {
            flex: 1;
            text-align: center;
        }
    }
</style>

<div class="form-container">

    <div class="form-title">
        <h3>Research Information Details</h3>
        <span class="badge-soft">Research Management</span>
    </div>

    <div class="form-content">

        <div class="details-grid">
            {{-- ✅ Keep only relevant fields (CR-2) --}}
            <div class="detail-row full">
                <div class="detail-label">Title</div>
                <p class="detail-value">{{ $data->RI_title }}</p>
            </div>

            <div class="detail-row full">
                <div class="detail-label">Abstract</div>
                <p class="detail-value">{{ $data->RI_abstract }}</p>
            </div>

            <div class="detail-row">
                <div class="detail-label">Research Area</div>
                <p class="detail-value">{{ $data->RI_area }}</p>
            </div>

            <div class="detail-row">
                <div class="detail-label">Budget</div>
                <p class="detail-value">{{ $data->RI_budget }}</p>
            </div>

            <div class="detail-row full">
                <div class="detail-label">Objective</div>
                <p class="detail-value">{{ $data->RI_objective }}</p>
            </div>

            <div class="detail-row full">
                <div class="detail-label">Methodology</div>
                <p class="detail-value">{{ $data->RI_methodology }}</p>
            </div>

            <div class="detail-row full">
                <div class="detail-label">Research Background</div>
                <p class="detail-value">{{ $data->RI_background }}</p>
            </div>

            <div class="detail-row">
                <div class="detail-label">Timeline</div>
                <p class="detail-value">{{ $data->RI_timeline }}</p>
            </div>

            {{-- ❌ Removed from view (CR-2): Authors, Outcome, Reference --}}
        </div>

        <div class="actions">
            <a href="{{ url('platinum/research/editResearch/' . $data->RI_ID) }}" class="btn btn-primary btn-soft">Edit</a>

            {{-- Preventive: delete confirmation popup (optional but recommended) --}}
            <a href="{{ url('platinum/research/deleteResearch/' . $data->RI_ID) }}"
               class="btn btn-danger btn-soft"
               onclick="return confirm('Are you sure you want to delete this research information?');">
               Delete
            </a>

            <a href="{{ url('platinum/research/listResearch') }}" class="btn btn-secondary btn-soft">Back</a>
        </div>
    </div>
</div>

@endsection
