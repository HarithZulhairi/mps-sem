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
        margin-bottom: 50px;
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

    .subtitle {
        text-align: center;
        font-size: 15px;
        color: #6b7280;
        margin-bottom: 20px;
        font-weight: 500;
    }

    /* Edit Options Grid */
    .edit-options-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 16px;
        margin-bottom: 20px;
    }

    .edit-option-card {
        background: #f9fafb;
        border: 2px solid #eef0f3;
        border-radius: 12px;
        padding: 20px;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .edit-option-card:hover {
        border-color: #2563eb;
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.15);
        transform: translateY(-2px);
    }

    .edit-option-card.profile:hover {
        border-color: #3b82f6;
    }

    .edit-option-card.research:hover {
        border-color: #10b981;
    }

    .edit-option-card.publication:hover {
        border-color: #f59e0b;
    }

    .edit-option-title {
        font-size: 16px;
        font-weight: 700;
        color: #111827;
        margin-bottom: 8px;
    }

    .edit-option-note {
        font-size: 13px;
        color: #6b7280;
        line-height: 1.4;
    }

    /* Modal */
    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.5);
        backdrop-filter: blur(4px);
    }

    .modal-content {
        background-color: #ffffff;
        margin: 3% auto;
        padding: 30px;
        border-radius: 12px;
        width: 90%;
        max-width: 800px;
        max-height: 85vh;
        overflow-y: auto;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
    }

    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        padding-bottom: 16px;
        border-bottom: 2px solid #eef0f3;
    }

    .modal-header h3 {
        font-size: 20px;
        font-weight: 700;
        color: #111827;
        margin: 0;
    }

    .close {
        color: #9ca3af;
        font-size: 32px;
        font-weight: 700;
        line-height: 1;
        cursor: pointer;
        transition: color 0.2s;
        background: none;
        border: none;
        padding: 0;
    }

    .close:hover {
        color: #111827;
    }

    /* Section Headers */
    .section-header {
        font-size: 18px;
        font-weight: 700;
        color: #111827;
        margin-top: 24px;
        margin-bottom: 16px;
        padding-bottom: 8px;
        border-bottom: 2px solid #eef0f3;
    }

    .section-header:first-of-type {
        margin-top: 10px;
    }

    /* Grid */
    .details-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 14px;
        margin-bottom: 14px;
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

    .detail-input,
    .detail-select {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #d1d5db;
        border-radius: 10px;
        font-size: 14px;
        outline: none;
        background: #fff;
    }

    .detail-input:focus,
    .detail-select:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
    }

    .required-star {
        color: #dc2626;
        margin-left: 4px;
    }

    .field-note {
        font-size: 11px;
        color: #6b7280;
        margin-top: 4px;
        font-style: italic;
    }

    /* Date Range */
    .date-range {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .date-range input {
        flex: 1;
    }

    .date-separator {
        color: #6b7280;
        font-weight: 600;
    }

    /* Dynamic Fields */
    .dynamic-field {
        background: #f9fafb;
        border: 1px solid #eef0f3;
        border-radius: 10px;
        padding: 16px;
        margin-bottom: 14px;
    }

    .dynamic-field-single {
        margin-bottom: 14px;
    }

    .research-number, .publication-number {
        display: inline-block;
        background: #2563eb;
        color: white;
        padding: 4px 12px;
        border-radius: 6px;
        font-size: 12px;
        font-weight: 700;
        margin-bottom: 12px;
    }

    /* Add Button */
    .add-link {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        color: #2563eb;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        margin-bottom: 14px;
        padding: 8px 12px;
        border-radius: 8px;
        transition: background-color 0.2s;
    }

    .add-link:hover {
        background-color: rgba(37, 99, 235, 0.08);
        text-decoration: none;
    }

    /* File Upload */
    .file-upload-wrapper {
        display: flex;
        align-items: center;
        gap: 12px;
        flex-wrap: wrap;
    }

    .upload-button {
        padding: 10px 16px;
        background-color: #2563eb;
        color: white;
        cursor: pointer;
        border: none;
        border-radius: 10px;
        font-weight: 600;
        font-size: 14px;
        transition: background-color 0.2s;
    }

    .upload-button:hover {
        background-color: #1d4ed8;
    }

    .file-name {
        font-size: 14px;
        color: #6b7280;
        font-style: italic;
    }

    /* Agreement Box */
    .agreement-box {
        background: #fef3c7;
        border: 1px solid #fbbf24;
        border-radius: 10px;
        padding: 16px;
        display: flex;
        align-items: flex-start;
        gap: 12px;
        margin: 20px 0;
    }

    .agreement-box input[type="checkbox"] {
        width: 20px;
        height: 20px;
        margin-top: 2px;
        cursor: pointer;
    }

    .agreement-box label {
        font-size: 14px;
        line-height: 1.6;
        color: #78350f;
        margin: 0;
        cursor: pointer;
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
        font-size: 14px;
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
        background: #6b7280;
        border-color: #6b7280;
        color: #fff;
    }

    .btn-secondary.btn-soft:hover {
        background: #4b5563;
        border-color: #4b5563;
    }

    /* Error Messages */
    .error-container {
        background: #fee2e2;
        border: 1px solid #fecaca;
        border-radius: 10px;
        padding: 16px;
        margin-bottom: 20px;
    }

    .error-container p {
        color: #dc2626;
        font-size: 14px;
        margin: 4px 0;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .edit-options-grid {
            grid-template-columns: 1fr;
        }

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

        .actions button {
            flex: 1;
            text-align: center;
        }

        .date-range {
            flex-direction: column;
            align-items: stretch;
        }

        .date-separator {
            text-align: center;
        }

        .modal-content {
            width: 95%;
            padding: 20px;
        }
    }
</style>

<script>
    function addQualification() {
        const container = document.getElementById('qualifications');
        const newField = document.createElement('div');
        newField.classList.add('dynamic-field-single');
        newField.innerHTML = `
            <select name="E_Qualification[]" class="detail-select">
                <option value="">Select qualification</option>
                <option value="Master">Master</option>
                <option value="PhD">PhD</option>
                <option value="Post-Doctoral">Post-Doctoral</option>
            </select>
        `;
        container.appendChild(newField);
    }

    function addGroupofExpertise() {
        const container = document.getElementById('group');
        const newField = document.createElement('div');
        newField.classList.add('dynamic-field-single');
        newField.innerHTML = `
            <input type="text" name="E_GroupExpertise[]" placeholder="e.g., Machine Learning, Data Science" class="detail-input">
        `;
        container.appendChild(newField);
    }

    function addAreaofExpertise() {
        const container = document.getElementById('area');
        const newField = document.createElement('div');
        newField.classList.add('dynamic-field-single');
        newField.innerHTML = `
            <input type="text" name="E_AreaExpertise[]" placeholder="e.g., Natural Language Processing, Computer Vision" class="detail-input">
        `;
        container.appendChild(newField);
    }

    function addResearch() {
        const container = document.getElementById('research');
        const newField = document.createElement('div');
        newField.classList.add('dynamic-field');
        newField.innerHTML = `
            <div class="details-grid">
                <div class="detail-row full">
                    <div class="detail-label">Research Title <span class="required-star">*</span></div>
                    <input type="text" name="E_ResearchTitle[]" placeholder="e.g., AI-Powered Healthcare Diagnosis System" class="detail-input">
                    <div class="field-note">Enter the full title of the research project</div>
                </div>

                <div class="detail-row full">
                    <div class="detail-label">Duration <span class="required-star">*</span></div>
                    <div class="date-range">
                        <input type="date" name="E_DurationStart[]" class="detail-input">
                        <span class="date-separator">—</span>
                        <input type="date" name="E_DurationEnd[]" class="detail-input">
                    </div>
                    <div class="field-note">Select the start and end dates of the research project</div>
                </div>

                <div class="detail-row full">
                    <div class="detail-label">Agent <span class="required-star">*</span></div>
                    <input type="text" name="E_Agent[]" placeholder="e.g., Ministry of Higher Education, FRGS" class="detail-input">
                    <div class="field-note">Name of the funding agency or sponsor</div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">Role <span class="required-star">*</span></div>
                    <select name="E_Role[]" class="detail-select">
                        <option value="leader">Leader</option>
                        <option value="member">Member</option>
                    </select>
                    <div class="field-note">Your role in the research</div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">Cost (RM) <span class="required-star">*</span></div>
                    <input type="text" name="E_Cost[]" placeholder="e.g., 50000" class="detail-input">
                    <div class="field-note">Total research grant amount in Malaysian Ringgit</div>
                </div>

                <div class="detail-row full">
                    <div class="detail-label">Status <span class="required-star">*</span></div>
                    <select name="E_Status[]" class="detail-select">
                        <option value="ongoing">On-going</option>
                        <option value="completed">Completed</option>
                        <option value="none">-</option>
                    </select>
                    <div class="field-note">Current status of the research project</div>
                </div>
            </div>
        `;
        container.appendChild(newField);
    }

    function addPublication() {
        const container = document.getElementById('publication');
        const newField = document.createElement('div');
        newField.classList.add('dynamic-field');
        newField.innerHTML = `
            <div class="details-grid">
                <div class="detail-row full">
                    <div class="detail-label">Publication Title <span class="required-star">*</span></div>
                    <input type="text" name="E_PublicationTitle[]" placeholder="e.g., Deep Learning Approaches for Medical Image Analysis" class="detail-input">
                    <div class="field-note">Full title of the published work</div>
                </div>

                <div class="detail-row full">
                    <div class="detail-label">Authors <span class="required-star">*</span></div>
                    <input type="text" name="E_Authors[]" placeholder="e.g., John Doe, Jane Smith, Robert Lee" class="detail-input">
                    <div class="field-note">List all authors separated by commas</div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">Publication Date <span class="required-star">*</span></div>
                    <input type="date" name="E_PublicationDate[]" class="detail-input">
                    <div class="field-note">Date of publication</div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">Source</div>
                    <input type="text" name="E_Source[]" placeholder="e.g., IEEE Transactions on AI" class="detail-input">
                    <div class="field-note">Journal or conference name</div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">Volume</div>
                    <input type="text" name="E_Volume[]" placeholder="e.g., Vol. 15" class="detail-input">
                    <div class="field-note">Journal volume number</div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">Pages</div>
                    <input type="text" name="E_Pages[]" placeholder="e.g., 123-145" class="detail-input">
                    <div class="field-note">Page range of the publication</div>
                </div>

                <div class="detail-row full">
                    <div class="detail-label">Publisher</div>
                    <input type="text" name="E_Publisher[]" placeholder="e.g., IEEE, Springer, Elsevier" class="detail-input">
                    <div class="field-note">Name of the publisher</div>
                </div>

                <div class="detail-row full">
                    <div class="detail-label">Publication Link <span class="required-star">*</span></div>
                    <input type="url" name="E_Link[]" placeholder="https://doi.org/10.xxxx/xxxxx" class="detail-input">
                    <div class="field-note">DOI link or URL to the publication</div>
                </div>
            </div>
        `;
        container.appendChild(newField);
    }

    function updateFileName(input) {
        const fileName = input.files[0]?.name || "";
        document.getElementById('file_name').innerText = fileName || "Current: {{ $expertdomain->E_Photo }}";
    }

    function openModal(modalId) {
        document.getElementById(modalId).style.display = "block";
        document.body.style.overflow = "hidden";
    }

    function closeModal(modalId) {
        document.getElementById(modalId).style.display = "none";
        document.body.style.overflow = "auto";
    }

    window.onclick = function(event) {
        if (event.target.classList.contains('modal')) {
            event.target.style.display = "none";
            document.body.style.overflow = "auto";
        }
    }
</script>

<div class="form-container">

    <div class="form-title">
        <h3>Edit Expert Information</h3>
    </div>

    <div class="form-content">

        @if($errors->any())
            <div class="error-container">
                @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            </div>
        @endif

        <p class="subtitle">Select the section you want to edit. Each section can be updated independently.</p>

        <div class="edit-options-grid">
            <div class="edit-option-card profile" onclick="openModal('profileModal')">
                <div class="edit-option-title">Edit Profile</div>
                <p class="edit-option-note">Update personal and professional details</p>
            </div>
            <div class="edit-option-card research" onclick="openModal('researchModal')">
                <div class="edit-option-title">Edit Research</div>
                <p class="edit-option-note">Manage research projects and grants</p>
            </div>
            <div class="edit-option-card publication" onclick="openModal('publicationModal')">
                <div class="edit-option-title">Edit Publication</div>
                <p class="edit-option-note">Update publications and academic works</p>
            </div>
        </div>

    </div>
</div>

<!-- Profile Modal -->
<div id="profileModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Edit Profile & Expertise</h3>
            <button class="close" onclick="closeModal('profileModal')">&times;</button>
        </div>

        <form method="post" action="{{ route('manage_expertdomain.UpdateExpert', ['expertdomain' => $expertdomain->E_ID]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="form_type" value="profile">

            <h3 class="section-header">Expert Profile</h3>

            <div class="details-grid">
                <div class="detail-row full">
                    <div class="detail-label">Name <span class="required-star">*</span></div>
                    <input type="text" name="E_Name" value="{{ old('E_Name', $expertdomain->E_Name) }}" placeholder="e.g., Dr. Ahmad bin Abdullah" class="detail-input">
                    <div class="field-note">Enter full name as per official documents</div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">Title <span class="required-star">*</span></div>
                    <select name="E_Title" class="detail-select" required>
                        <option value="">Select title</option>
                        <option value="Dr" {{ old('E_Title', $expertdomain->E_Title) == 'Dr' ? 'selected' : '' }}>Dr</option>
                        <option value="Professor" {{ old('E_Title', $expertdomain->E_Title) == 'Professor' ? 'selected' : '' }}>Professor</option>
                        <option value="Ts" {{ old('E_Title', $expertdomain->E_Title) == 'Ts' ? 'selected' : '' }}>Ts</option>
                        <option value="Prof. Madya" {{ old('E_Title', $expertdomain->E_Title) == 'Prof. Madya' ? 'selected' : '' }}>Prof. Madya</option>
                    </select>
                    <div class="field-note">Academic or professional title</div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">Email <span class="required-star">*</span></div>
                    <input type="email" name="E_Email" value="{{ old('E_Email', $expertdomain->E_Email) }}" placeholder="e.g., expert@university.edu.my" class="detail-input">
                    <div class="field-note">Professional email address</div>
                </div>

                <div class="detail-row full">
                    <div class="detail-label">Permanent Position <span class="required-star">*</span></div>
                    <input type="text" name="E_Position" value="{{ old('E_Position', $expertdomain->E_Position) }}" placeholder="e.g., Senior Lecturer, Associate Professor" class="detail-input">
                    <div class="field-note">Current job title or academic position</div>
                </div>

                <div class="detail-row full">
                    <div class="detail-label">Workplace <span class="required-star">*</span></div>
                    <input type="text" name="E_Workplace" value="{{ old('E_Workplace', $expertdomain->E_Workplace) }}" placeholder="e.g., Universiti Teknologi Malaysia" class="detail-input">
                    <div class="field-note">Current institution or organization</div>
                </div>
            </div>

            <div class="detail-label" style="margin-bottom: 8px;">Qualification <span class="required-star">*</span></div>
            <div id="qualifications">
                @foreach(json_decode($expertdomain->E_Qualification, true) as $qualification)
                    <div class="dynamic-field-single">
                        <select name="E_Qualification[]" class="detail-select">
                            <option value="">Select qualification</option>
                            <option value="Master" {{ $qualification == 'Master' ? 'selected' : '' }}>Master</option>
                            <option value="PhD" {{ $qualification == 'PhD' ? 'selected' : '' }}>PhD</option>
                            <option value="Post-Doctoral" {{ $qualification == 'Post-Doctoral' ? 'selected' : '' }}>Post-Doctoral</option>
                        </select>
                    </div>
                @endforeach
            </div>
            <div class="field-note" style="margin-top: -8px; margin-bottom: 8px;">Highest academic qualification achieved</div>
            <a href="javascript:void(0);" onclick="addQualification()" class="add-link">+ Add another qualification</a>

            <div class="detail-row">
                <div class="detail-label">Expert's Picture</div>
                <div class="file-upload-wrapper">
                    <input type="file" id="E_Photo" name="E_Photo" accept=".jpeg,.jpg,.png,.gif,image/jpeg,image/png,image/gif" style="display: none;" onchange="updateFileName(this)">
                    <button type="button" class="upload-button" onclick="document.getElementById('E_Photo').click()">Upload Photo</button>
                    <span id="file_name" class="file-name">Current: {{ $expertdomain->E_Photo }}</span>
                </div>
                <div class="field-note">Supported formats: JPEG, PNG, JPG, GIF (Max: 24MB)</div>
            </div>

            <h3 class="section-header">Expert Field</h3>

            <div class="details-grid">
                <div class="detail-row full">
                    <div class="detail-label">Category of Expertise</div>
                    <input type="text" name="E_CategoryExpertise" value="{{ old('E_CategoryExpertise', $expertdomain->E_CategoryExpertise) }}" placeholder="e.g., Computer Science, Engineering" class="detail-input">
                    <div class="field-note">Broad field of expertise</div>
                </div>
            </div>

            <div class="detail-label" style="margin-bottom: 8px;">Group of Expertise</div>
            <div id="group">
                @foreach(json_decode($expertdomain->E_GroupExpertise, true) as $group)
                    <div class="dynamic-field-single">
                        <input type="text" name="E_GroupExpertise[]" value="{{ $group }}" placeholder="e.g., Machine Learning, Data Science" class="detail-input">
                    </div>
                @endforeach
            </div>
            <div class="field-note" style="margin-top: -8px; margin-bottom: 8px;">Specific group or sub-field within your category</div>
            <a href="javascript:void(0);" onclick="addGroupofExpertise()" class="add-link">+ Add another group of expertise</a>

            <div class="detail-label" style="margin-bottom: 8px;">Area of Expertise</div>
            <div id="area">
                @foreach(json_decode($expertdomain->E_AreaExpertise, true) as $area)
                    <div class="dynamic-field-single">
                        <input type="text" name="E_AreaExpertise[]" value="{{ $area }}" placeholder="e.g., Natural Language Processing, Computer Vision" class="detail-input">
                    </div>
                @endforeach
            </div>
            <div class="field-note" style="margin-top: -8px; margin-bottom: 8px;">Specialized areas within your expertise</div>
            <a href="javascript:void(0);" onclick="addAreaofExpertise()" class="add-link">+ Add another area of expertise</a>

            <div class="agreement-box">
                <input type="checkbox" id="agreement" name="agreement" value="agreement" required>
                <label for="agreement">I confirm that the information provided in my expert profile is accurate. I understand and agree to comply with the Upload Conditions. <span class="required-star">*</span></label>
            </div>

            <div class="actions">
                <button type="button" class="btn btn-secondary btn-soft" onclick="closeModal('profileModal')">Cancel</button>
                <button type="submit" class="btn btn-primary btn-soft">Update Profile</button>
            </div>

        </form>
    </div>
</div>

<!-- Research Modal -->
<div id="researchModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Edit Research Projects</h3>
            <button class="close" onclick="closeModal('researchModal')">&times;</button>
        </div>

        <form method="post" action="{{ route('manage_expertdomain.UpdateExpert', ['expertdomain' => $expertdomain->E_ID]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="form_type" value="research">

            <h3 class="section-header">Expert Research</h3>

            <div id="research">
                @foreach(json_decode($expertdomain->E_ResearchTitle, true) as $index => $researchTitle)
                    <div class="dynamic-field">
                        <span class="research-number">Research {{ $index + 1 }}</span>
                        <div class="details-grid">
                            <div class="detail-row full">
                                <div class="detail-label">Research Title <span class="required-star">*</span></div>
                                <input type="text" name="E_ResearchTitle[]" value="{{ $researchTitle }}" placeholder="e.g., AI-Powered Healthcare Diagnosis System" class="detail-input">
                                <div class="field-note">Enter the full title of the research project</div>
                            </div>

                            <div class="detail-row full">
                                <div class="detail-label">Duration <span class="required-star">*</span></div>
                                <div class="date-range">
                                    <input type="date" name="E_DurationStart[]" value="{{ json_decode($expertdomain->E_DurationStart, true)[$index] }}" class="detail-input">
                                    <span class="date-separator">—</span>
                                    <input type="date" name="E_DurationEnd[]" value="{{ json_decode($expertdomain->E_DurationEnd, true)[$index] }}" class="detail-input">
                                </div>
                                <div class="field-note">Select the start and end dates of the research project</div>
                            </div>

                            <div class="detail-row full">
                                <div class="detail-label">Agent <span class="required-star">*</span></div>
                                <input type="text" name="E_Agent[]" value="{{ json_decode($expertdomain->E_Agent, true)[$index] }}" placeholder="e.g., Ministry of Higher Education, FRGS" class="detail-input">
                                <div class="field-note">Name of the funding agency or sponsor</div>
                            </div>

                            <div class="detail-row">
                                <div class="detail-label">Role <span class="required-star">*</span></div>
                                <select name="E_Role[]" class="detail-select">
                                    <option value="leader" {{ json_decode($expertdomain->E_Role, true)[$index] == 'leader' ? 'selected' : '' }}>Leader</option>
                                    <option value="member" {{ json_decode($expertdomain->E_Role, true)[$index] == 'member' ? 'selected' : '' }}>Member</option>
                                </select>
                                <div class="field-note">Your role in the research</div>
                            </div>

                            <div class="detail-row">
                                <div class="detail-label">Cost (RM) <span class="required-star">*</span></div>
                                <input type="text" name="E_Cost[]" value="{{ json_decode($expertdomain->E_Cost, true)[$index] }}" placeholder="e.g., 50000" class="detail-input">
                                <div class="field-note">Total research grant amount in Malaysian Ringgit</div>
                            </div>

                            <div class="detail-row full">
                                <div class="detail-label">Status <span class="required-star">*</span></div>
                                <select name="E_Status[]" class="detail-select">
                                    <option value="ongoing" {{ json_decode($expertdomain->E_Status, true)[$index] == 'ongoing' ? 'selected' : '' }}>On-going</option>
                                    <option value="completed" {{ json_decode($expertdomain->E_Status, true)[$index] == 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="none" {{ json_decode($expertdomain->E_Status, true)[$index] == 'none' ? 'selected' : '' }}>-</option>
                                </select>
                                <div class="field-note">Current status of the research project</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <a href="javascript:void(0);" onclick="addResearch()" class="add-link">+ Add another research</a>

            <div class="agreement-box">
                <input type="checkbox" id="agreement" name="agreement" value="agreement" required>
                <label for="agreement">I confirm that the information provided in my expert profile is accurate. I understand and agree to comply with the Upload Conditions. <span class="required-star">*</span></label>
            </div>

            <div class="actions">
                <button type="button" class="btn btn-secondary btn-soft" onclick="closeModal('researchModal')">Cancel</button>
                <button type="submit" class="btn btn-primary btn-soft">Update Research</button>
            </div>

        </form>
    </div>
</div>

<!-- Publication Modal -->
<div id="publicationModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Edit Publications</h3>
            <button class="close" onclick="closeModal('publicationModal')">&times;</button>
        </div>

        <form method="post" action="{{ route('manage_expertdomain.UpdateExpert', ['expertdomain' => $expertdomain->E_ID]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="form_type" value="publication">

            <h3 class="section-header">Expert Publication</h3>

            <div id="publication">
                @foreach(json_decode($expertdomain->E_PublicationTitle, true) as $index => $publicationTitle)
                    <div class="dynamic-field">
                        <span class="publication-number">Publication {{ $index + 1 }}</span>
                        <div class="details-grid">
                            <div class="detail-row full">
                                <div class="detail-label">Publication Title <span class="required-star">*</span></div>
                                <input type="text" name="E_PublicationTitle[]" value="{{ $publicationTitle }}" placeholder="e.g., Deep Learning Approaches for Medical Image Analysis" class="detail-input">
                                <div class="field-note">Full title of the published work</div>
                            </div>

                            <div class="detail-row full">
                                <div class="detail-label">Authors <span class="required-star">*</span></div>
                                <input type="text" name="E_Authors[]" value="{{ json_decode($expertdomain->E_Authors, true)[$index] }}" placeholder="e.g., John Doe, Jane Smith, Robert Lee" class="detail-input">
                                <div class="field-note">List all authors separated by commas</div>
                            </div>

                            <div class="detail-row">
                                <div class="detail-label">Publication Date <span class="required-star">*</span></div>
                                <input type="date" name="E_PublicationDate[]" value="{{ json_decode($expertdomain->E_PublicationDate, true)[$index] }}" class="detail-input">
                                <div class="field-note">Date of publication</div>
                            </div>

                            <div class="detail-row">
                                <div class="detail-label">Source</div>
                                <input type="text" name="E_Source[]" value="{{ json_decode($expertdomain->E_Source, true)[$index] }}" placeholder="e.g., IEEE Transactions on AI" class="detail-input">
                                <div class="field-note">Journal or conference name</div>
                            </div>

                            <div class="detail-row">
                                <div class="detail-label">Volume</div>
                                <input type="text" name="E_Volume[]" value="{{ json_decode($expertdomain->E_Volume, true)[$index] }}" placeholder="e.g., Vol. 15" class="detail-input">
                                <div class="field-note">Journal volume number</div>
                            </div>

                            <div class="detail-row">
                                <div class="detail-label">Pages</div>
                                <input type="text" name="E_Pages[]" value="{{ json_decode($expertdomain->E_Pages, true)[$index] }}" placeholder="e.g., 123-145" class="detail-input">
                                <div class="field-note">Page range of the publication</div>
                            </div>

                            <div class="detail-row full">
                                <div class="detail-label">Publisher</div>
                                <input type="text" name="E_Publisher[]" value="{{ json_decode($expertdomain->E_Publisher, true)[$index] }}" placeholder="e.g., IEEE, Springer, Elsevier" class="detail-input">
                                <div class="field-note">Name of the publisher</div>
                            </div>

                            <div class="detail-row full">
                                <div class="detail-label">Publication Link <span class="required-star">*</span></div>
                                <input type="url" name="E_Link[]" value="{{ json_decode($expertdomain->E_Link, true)[$index] }}" placeholder="https://doi.org/10.xxxx/xxxxx" class="detail-input">
                                <div class="field-note">DOI link or URL to the publication</div>
                            </div>

                            <div class="detail-row full">
                                <div class="detail-label">Related Research (Optional)</div>
                                <select name="E_PublicationResearch[]" class="detail-select">
                                    <option value="">-- Not Assigned --</option>
                                    @foreach(json_decode($expertdomain->E_ResearchTitle, true) as $rIndex => $researchTitle)
                                        @php
                                            $publicationResearch = json_decode($expertdomain->E_PublicationResearch ?? '[]', true);
                                            $isSelected = isset($publicationResearch[$index]) && $publicationResearch[$index] == $rIndex;
                                        @endphp
                                        <option value="{{ $rIndex }}" {{ $isSelected ? 'selected' : '' }}>
                                            Research {{ $rIndex + 1 }} – {{ $researchTitle }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="field-note">Link this publication to a research project if applicable</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <a href="javascript:void(0);" onclick="addPublication()" class="add-link">+ Add another publication</a>

            <div class="agreement-box">
                <input type="checkbox" id="agreement" name="agreement" value="agreement" required>
                <label for="agreement">I confirm that the information provided in my expert profile is accurate. I understand and agree to comply with the Upload Conditions. <span class="required-star">*</span></label>
            </div>

            <div class="actions">
                <button type="button" class="btn btn-secondary btn-soft" onclick="closeModal('publicationModal')">Cancel</button>
                <button type="submit" class="btn btn-primary btn-soft">Update Publications</button>
            </div>

        </form>
    </div>
</div>

@endsection
