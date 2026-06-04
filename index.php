<!DOCTYPE html>
<html lang="en">
<head>
google-site-verification=CGqno4bP2IdugHVCnlHt6fFtvK_3VH87VuzVatudcGA
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Kritika Jain - Data Analyst</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family: 'Segoe UI', sans-serif;
}

body{
    min-height:100vh;
    background:linear-gradient(-45deg,
    #f8f9fa,
    #e3f2fd,
    #f3e5f5,
    #e8f5e9);
    background-size:400% 400%;
    animation:gradientBG 12s ease infinite;
}
@keyframes gradientBG{
    0%{background-position:0% 50%;}
    50%{background-position:100% 50%;}
    100%{background-position:0% 50%;}
}
header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:20px 8%;
    background:white;
    box-shadow:0 2px 10px rgba(0,0,0,0.08);
}

.logo{
    font-size:28px;
    font-weight:bold;
    color:#2c3e50;
}

.contact-btn{
    text-decoration:none;
    color:white;
    padding:12px 24px;
    border-radius:30px;
    font-weight:bold;
    background:linear-gradient(45deg,#3498db,#8e44ad);
    transition:0.3s;
}

.contact-btn:hover{
    transform:translateY(-3px);
}
.hero{
    max-width:1200px;
    margin:50px auto;
    padding:50px;
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:50px;

    background:rgba(255,255,255,0.70);
    backdrop-filter:blur(10px);
    border-radius:25px;
    box-shadow:0 15px 35px rgba(0,0,0,0.12);
}
.content{
    flex:1;
}

.content h1{
    font-size:56px;
    margin-bottom:10px;
    background:linear-gradient(45deg,#3498db,#8e44ad);
    -webkit-background-clip:text;
    -webkit-text-fill-color:transparent;
}

.content h2{
    font-size:24px;
    color:#6c757d;
    margin-bottom:25px;
}

.skills {
    margin: 30px 0;
}

.skills h2 {
    font-size: 22px;
    color: #2c3e50;
    margin-bottom: 15px;
}

.skill-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.skill-grid div {
    background: rgba(52, 152, 219, 0.1);
    color: #3498db;
    padding: 8px 16px;
    border-radius: 20px;
    font-weight: 500;
    font-size: 14px;
}

.hero-buttons {
    margin-bottom: 30px;
}

.cv-btn, .project-btn {
    text-decoration: none;
    padding: 10px 20px;
    border-radius: 20px;
    font-weight: bold;
    display: inline-block;
    margin-right: 10px;
}

.cv-btn {
    background: #3498db;
    color: white;
}

.project-btn {
    background: #8e44ad;
    color: white;
}

.content p{
    font-size:18px;
    line-height:1.8;
    color:#555;
    text-align:justify;
}

.profile-img{
    flex:1;
    text-align:center;
}

.profile-img img{
    width:380px;
    height:380px;
    object-fit:cover;
    border-radius:50%;
    border:8px solid white;

    box-shadow:
    0 0 25px rgba(52,152,219,0.4),
    0 0 50px rgba(142,68,173,0.3);

    transition:all .4s ease;
}

.profile-img img:hover{
    transform:scale(1.08) rotate(2deg);
}

.projects {
    margin: 40px 0;
}

.project-card {
    background: rgba(255,255,255,0.8);
    padding: 20px;
    border-radius: 10px;
    margin-bottom: 15px;
    box-shadow: 0 4px 6px rgba(0,0,0,0.05);
}

.project-card h3 {
    color: #2c3e50;
    margin-bottom: 8px;
}

/* --- Interactive Demo Elements --- */
.preview-trigger-btn {
    display: inline-block;
    margin-top: 12px;
    padding: 8px 16px;
    background: #3498db;
    color: #fff;
    text-decoration: none;
    font-weight: bold;
    border-radius: 6px;
    font-size: 14px;
    transition: background 0.2s ease;
    border: none;
    cursor: pointer;
}

.preview-trigger-btn:hover {
    background: #2980b9;
}

/* Modal Popup Framework Styles */
.demo-modal {
    display: none; 
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.6);
    backdrop-filter: blur(4px);
    align-items: center;
    justify-content: center;
}

.modal-content {
    background-color: #fff;
    border-radius: 16px;
    width: 90%;
    max-width: 950px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.3);
    animation: modalSlideIn 0.3s ease;
    overflow: hidden;
    display: flex;
    flex-direction: column;
}

@keyframes modalSlideIn {
    from { transform: translateY(-30px); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
}

.modal-header {
    padding: 15px 25px;
    background: #2c3e50;
    color: #fff;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.modal-header h3 {
    font-size: 20px;
}

.close-modal {
    color: #bdc3c7;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
    transition: color 0.2s;
}

.close-modal:hover {
    color: #fff;
}

.modal-body {
    padding: 0;
    background: #f8f9fa;
    position: relative;
    padding-bottom: 56.25%; /* Responsive 16:9 aspect ratio box */
    height: 0;
}

.modal-body iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: 0;
}

footer{
    text-align:center;
    padding:20px;
    color:#666;
}

@media(max-width:768px){
    .hero{
        flex-direction:column;
        text-align:center;
    }

    .content h1{
        font-size:36px;
    }

    .profile-img img{
        width:250px;
        height:250px;
    }
    
    .skill-grid {
        justify-content: center;
    }
}
</style>
</head>
<body>

<header>
    <div class="logo">Kritika Jain</div>
    <a href="contact.php" class="contact-btn">Contact Me</a>
</header>

<section class="hero">
    <div class="content">
        <h1><b>Kritika Jain</b></h1>
        <h2><b>Data Analyst | United Kingdom</b></h2>
        
        <div class="hero-buttons">
            <a href="Kritika_Jain_CV.pdf" class="cv-btn">Download CV</a>
            <a href="#projects" class="project-btn">View Projects</a>
        </div>

        <section class="skills">
            <h2>Technical Skills</h2>
            <div class="skill-grid">
                <div>Power BI</div>
                <div>SQL</div>
                <div>Excel</div>
                <div>Python</div>
                <div>Data Visualization</div>
                <div>Dashboard Development</div>
            </div>
        </section>

        <p>
            <b>Kritika Jain</b> is a dedicated and detail-oriented
            <b>Data Analyst based in the United Kingdom.</b>
            She specializes in transforming complex data into meaningful
            insights that support informed business decisions[cite: 2].

            With expertise in data analysis, reporting, visualization,
            and problem-solving, she helps organizations identify trends,
            improve performance, and achieve strategic objectives[cite: 2].
        </p>

        <!-- Dynamic Projects Section with Interactive Preview Trigger Hooks -->
        <section id="projects" class="projects">
            <h2>Featured Projects</h2>
            
            <div class="project-card">
                <h3>Power BI Sales Dashboard</h3>
                <p>Built an interactive dashboard displaying KPIs, sales performance, regional trends and forecasts.</p>
                <button class="preview-trigger-btn" onclick="openDashboardModal('Power BI Sales Dashboard Demo', 'https://images.pexels.com/photos/669615/pexels-photo-669615.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1', true)">
                    📊 View Dashboard Preview
                </button>
            </div>

            <div class="project-card">
                <h3>Customer Churn Analysis</h3>
                <p>Used SQL and Power BI to identify customer retention drivers and churn patterns.</p>
                <button class="preview-trigger-btn" onclick="openDashboardModal('Customer Churn Dashboard Demo', 'https://images.pexels.com/photos/7567443/pexels-photo-7567443.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1', true)">
                    📊 View Dashboard Preview
                </button>
            </div>

            <div class="project-card">
                <h3><div class="project-card">
    <h3>HR Analytics Dashboard Walkthrough</h3>
    <p>Created workforce analytics dashboards for employee attrition and performance tracking. Watch the video walkthrough below.</p>
    <button class="preview-trigger-btn" onclick="openDashboardModal('HR Analytics Dashboard Video Demo', 'https://www.youtube.com/embed/dQw4w9WgXcQ?autoplay=1&mute=1', false)">
        🎥 Watch Video Demo
    </button>
</div>
        </section> </div> <div class="profile-img">
        <img src="kritika.jpg" alt="Kritika Jain">
    </div>
</section>

<!-- Global Shared Preview Modal Container -->
<div id="dashboardPreviewModal" class="demo-modal" style="display: none;">
    <div class="modal-content">
        <div class="modal-header">
            <h3 id="modalProjectTitle">Project Dashboard Demo</h3>
            <span class="close-modal" onclick="closeDashboardModal()">&times;</span>
        </div>
        <!-- This container now supports both <img> and <iframe> -->
        <div class="modal-body" id="modalViewContainer" style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden;">
        </div>
    </div>
</div>

<footer>
    © <?php echo date('Y'); ?> Kritika Jain | Data Analyst
</footer>

<!-- Functional Modal UI Controller Engine -->
<script>
    // Explicitly scope functions to the window object to prevent tracking loss
    window.openDashboardModal = function(projectTitle, embedUrl, isImage = false) {
        const modal = document.getElementById('dashboardPreviewModal');
        const title = document.getElementById('modalProjectTitle');
        const container = document.getElementById('modalViewContainer');

        if (!modal || !container || !title) return;

        title.innerText = projectTitle;
        
        if (isImage) {
            container.innerHTML = `<img src="${embedUrl}" style="position: absolute; top:0; left:0; width:100%; height:100%; object-fit: contain; background:#ffffff;">`;
        } else {
            container.innerHTML = `<iframe src="${embedUrl}" style="position: absolute; top:0; left:0; width:100%; height:100%; border:0;" allowFullScreen="true"></iframe>`;
        }

        modal.style.display = "flex";
        document.body.style.overflow = "hidden"; // Freeze background scrolling
    };

    window.closeDashboardModal = function() {
        const modal = document.getElementById('dashboardPreviewModal');
        const container = document.getElementById('modalViewContainer');

        if (!modal || !container) return;

        modal.style.display = "none";
        container.innerHTML = ""; // Wipe content completely to clear cache memory
        document.body.style.overflow = "auto"; // Restore background scrolling
    };

    // Backup listener: Close immediately if the dark background wrapper itself is clicked
    window.addEventListener('click', function(event) {
        const modal = document.getElementById('dashboardPreviewModal');
        if (event.target === modal) {
            window.closeDashboardModal();
        }
    });
</script>
</body>
</html>