import './bootstrap';
import 'flowbite';
import Tagify from '@yaireo/tagify';

// Define Global Models
const generalErrAlert = document.getElementById('generalErrAlert');
generalErrAlert.style.display = 'none';

// Handle Skills and Quanlifications

let skills = document.querySelector('#skills');
let qualifications = document.querySelector('#qualifications');

document.addEventListener('DOMContentLoaded', function() {
	let skillsTagify = new Tagify(skills, {
		whitelist: ["Communication Skills", "Financial Skills", "Interpersonal Skills", "Problem-Solving Skills", "Technical Skills", "Management Skills", "Sales and Marketing Skills", "Language Skills"],
		dropdown: {
			enabled: 0
		}
	});
	
	skillsTagify.on('add', function(event) {
		let selectedSkills = skillsTagify.value.map(tag => tag.value);
		loader.style.display = 'block';
		fetch(document.querySelector('meta[name="base-url"]').getAttribute('content') + '/update-skills', {
			method: 'POST',
			headers: {
				'Content-Type': 'application/json',
				'X-CSRF-TOKEN': csrfToken
			},
			body: JSON.stringify({ selectedSkills: selectedSkills })
		})
		.then(response => {
			if (!response.ok) {
				throw new Error('Network response was not ok');
			}
			// Parse the JSON data from the response body
			return response.json();
		})
		.then(data => {
			loader.style.display = 'none';
		})
		.catch(error => {
			generalErrAlert.style.display = 'block';
			loader.style.display = 'none';
		});
	});
	
	skillsTagify.on('remove', function(event) {
		let selectedSkills = skillsTagify.value.map(tag => tag.value);
		loader.style.display = 'block';
		fetch(document.querySelector('meta[name="base-url"]').getAttribute('content') + '/update-skills', {
			method: 'POST',
			headers: {
				'Content-Type': 'application/json',
				'X-CSRF-TOKEN': csrfToken
			},
			body: JSON.stringify({ selectedSkills: selectedSkills })
		})
		.then(response => {
			if (!response.ok) {
				throw new Error('Network response was not ok');
			}
			// Parse the JSON data from the response body
			return response.json();
		})
		.then(data => {
			loader.style.display = 'none';
		})
		.catch(error => {
			generalErrAlert.style.display = 'block';
			loader.style.display = 'none';
		});
	});
	
	let qualificationsTagify = new Tagify(qualifications, {
		whitelist: ["High School Diploma", "Associate Degree", "Bachelor’s Degree", "Master’s Degree", "Doctorate (Ph.D.)",
					"Project Management Professional (PMP)", "Certified Public Accountant (CPA)", "Certified Information Systems Security Professional (CISSP)",
					"Six Sigma Certification", "Certified Nursing Assistant (CNA)", "Apprenticeships", "Journeyman Certification", "Trade School Diplomas",
					"Vocational Training Certificates", "Test of English as a Foreign Language (TOEFL)", "International English Language Testing System (IELTS)", "Diplôme d'études en langue française (DELF)",
					"Test of Proficiency in Korean (TOPIK)", "Medical Doctor (MD)", "Registered Nurse (RN)", "Licensed Practical Nurse (LPN)", "Board Certification in Specialties",
					"CompTIA A+", "Cisco Certified Network Associate (CCNA)", "Microsoft Certified: Azure Fundamentals", "AWS Certified Solutions Architect", "Oracle Certified Professional",
					"Juris Doctor (JD)", "Bar Exam Certification", "Certified Paralegal"],
		dropdown: {
			 enabled: 0
		},
		enforceWhitelist: true,
	});
	
	qualificationsTagify.on('add', function(event) {
		let selectedQualifications = qualificationsTagify.value.map(tag => tag.value);
		loader.style.display = 'block';
		fetch(document.querySelector('meta[name="base-url"]').getAttribute('content') + '/update-qualifications', {
			method: 'POST',
			headers: {
				'Content-Type': 'application/json',
				'X-CSRF-TOKEN': csrfToken
			},
			body: JSON.stringify({ selectedQualifications: selectedQualifications })
		})
		.then(response => {
			if (!response.ok) {
				throw new Error('Network response was not ok');
			}
			// Parse the JSON data from the response body
			return response.json();
		})
		.then(data => {
			loader.style.display = 'none';
		})
		.catch(error => {
			generalErrAlert.style.display = 'block';
			loader.style.display = 'none';
		});
	});
	
	qualificationsTagify.on('remove', function(event) {
		let selectedQualifications = qualificationsTagify.value.map(tag => tag.value);
		loader.style.display = 'block';
		fetch(document.querySelector('meta[name="base-url"]').getAttribute('content') + '/update-qualifications', {
			method: 'POST',
			headers: {
				'Content-Type': 'application/json',
				'X-CSRF-TOKEN': csrfToken
			},
			body: JSON.stringify({ selectedQualifications: selectedQualifications })
		})
		.then(response => {
			if (!response.ok) {
				throw new Error('Network response was not ok');
			}
			// Parse the JSON data from the response body
			return response.json();
		})
		.then(data => {
			loader.style.display = 'none';
		})
		.catch(error => {
			generalErrAlert.style.display = 'block';
			loader.style.display = 'none';
		});
	});
});