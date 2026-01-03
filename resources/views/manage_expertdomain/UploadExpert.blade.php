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

    /* Dynamic Fields Container */
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
        document.getElementById('file_name').innerText = fileName || "No file chosen";
    }
</script>

<div class="form-container">

    <div class="form-title">
        <h3>Upload Expert Information</h3>
        <span class="badge-soft">Expert Management</span>
    </div>

    <div class="form-content">

        @if($errors->any())
            <div class="error-container">
                @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            </div>
        @endif

        <form method="post" action="{{route('manage_expertdomain.SaveExpert')}}" enctype="multipart/form-data">
            @csrf
            @method('post')

            <!-- Expert Profile Section -->
            <h3 class="section-header">Expert Profile</h3>

            <div class="details-grid">
                <div class="detail-row full">
                    <div class="detail-label">Name <span class="required-star">*</span></div>
                    <input type="text" name="E_Name" placeholder="e.g., Dr. Ahmad bin Abdullah" class="detail-input">
                    <div class="field-note">Enter full name as per official documents</div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">Title <span class="required-star">*</span></div>
                    <select name="E_Title" class="detail-select" required>
                        <option value="">Select title</option>
                        <option value="Dr">Dr</option>
                        <option value="Professor">Professor</option>
                        <option value="Ts">Ts</option>
                        <option value="Prof. Madya">Prof. Madya</option>
                    </select>
                    <div class="field-note">Academic or professional title</div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">Email <span class="required-star">*</span></div>
                    <input type="email" name="E_Email" placeholder="e.g., expert@university.edu.my" class="detail-input">
                    <div class="field-note">Professional email address</div>
                </div>

                <div class="detail-row full">
                    <div class="detail-label">Permanent Position <span class="required-star">*</span></div>
                    <input type="text" name="E_Position" placeholder="e.g., Senior Lecturer, Associate Professor" class="detail-input">
                    <div class="field-note">Current job title or academic position</div>
                </div>

                <div class="detail-row full">
                    <div class="detail-label">Workplace <span class="required-star">*</span></div>
                    <input type="text" name="E_Workplace" placeholder="e.g., Universiti Teknologi Malaysia" class="detail-input">
                    <div class="field-note">Current institution or organization</div>
                </div>
            </div>

            <div class="detail-label" style="margin-bottom: 8px;">Qualification <span class="required-star">*</span></div>
            <div id="qualifications">
                <div class="dynamic-field-single">
                    <select name="E_Qualification[]" class="detail-select" required>
                        <option value="">Select qualification</option>
                        <option value="Master">Master</option>
                        <option value="PhD">PhD</option>
                        <option value="Post-Doctoral">Post-Doctoral</option>
                    </select>
                </div>
            </div>
            <div class="field-note" style="margin-top: -8px; margin-bottom: 8px;">Highest academic qualification achieved</div>
            <a href="javascript:void(0);" onclick="addQualification()" class="add-link">+ Add another qualification</a>

            <div class="detail-row">
                <div class="detail-label">Expert's Picture</div>
                <div class="file-upload-wrapper">
                    <input type="file" id="E_Photo" name="E_Photo" accept=".jpeg,.jpg,.png,.gif,image/jpeg,image/png,image/gif" style="display: none;" onchange="updateFileName(this)">
                    <button type="button" class="upload-button" onclick="document.getElementById('E_Photo').click()">Upload Photo</button>
                    <span id="file_name" class="file-name">No file chosen</span>
                </div>
                <div class="field-note">Supported formats: JPEG, PNG, JPG, GIF (Max: 24MB)</div>
            </div>

            <!-- Expert Field Section -->
            <h3 class="section-header">Expert Field</h3>

            <div class="details-grid">
                <div class="detail-row full">
                    <div class="detail-label">Category of Expertise</div>
                    <input type="text" name="E_CategoryExpertise" placeholder="e.g., Computer Science, Engineering" class="detail-input">
                    <div class="field-note">Broad field of expertise</div>
                </div>
            </div>

            <div class="detail-label" style="margin-bottom: 8px;">Group of Expertise</div>
            <div id="group">
                <div class="dynamic-field-single">
                    <input type="text" name="E_GroupExpertise[]" placeholder="e.g., Machine Learning, Data Science" class="detail-input">
                </div>
            </div>
            <div class="field-note" style="margin-top: -8px; margin-bottom: 8px;">Specific group or sub-field within your category</div>
            <a href="javascript:void(0);" onclick="addGroupofExpertise()" class="add-link">+ Add another group of expertise</a>

            <div class="detail-label" style="margin-bottom: 8px;">Area of Expertise</div>
            <div id="area">
                <div class="dynamic-field-single">
                    <input type="text" name="E_AreaExpertise[]" placeholder="e.g., Natural Language Processing, Computer Vision" class="detail-input">
                </div>
            </div>
            <div class="field-note" style="margin-top: -8px; margin-bottom: 8px;">Specialized areas within your expertise</div>
            <a href="javascript:void(0);" onclick="addAreaofExpertise()" class="add-link">+ Add another area of expertise</a>

            <!-- Expert Research Section -->
            <h3 class="section-header">Expert Research</h3>

            <div id="research">
                <div class="dynamic-field">
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
                </div>
            </div>
            <a href="javascript:void(0);" onclick="addResearch()" class="add-link">+ Add another research</a>

            <!-- Expert Publication Section -->
            <h3 class="section-header">Expert Publication</h3>

            <div id="publication">
                <div class="dynamic-field">
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
                </div>
            </div>
            <a href="javascript:void(0);" onclick="addPublication()" class="add-link">+ Add another publication</a>

            <!-- Agreement Box -->
            <div class="agreement-box">
                <input type="checkbox" id="agreement" name="agreement" value="agreement" required>
                <label for="agreement">I confirm that the information provided in my expert profile is accurate. I understand and agree to comply with the Upload Conditions. <span class="required-star">*</span></label>
            </div>

            <!-- Actions -->
            <div class="actions">
                <button type="submit" class="btn btn-primary btn-soft">Submit</button>
            </div>

        </form>
    </div>
</div>

@endsection
