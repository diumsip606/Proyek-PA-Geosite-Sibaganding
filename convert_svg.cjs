const { Resvg } = require('@resvg/resvg-js');
const fs = require('fs');
const path = require('path');

const projectDir = 'c:/Users/ASUS/Downloads/Proyek-PA-Geosite-Sibaganding-master/Proyek-PA-Geosite-Sibaganding-master/Latihan';

function convert(svgFilename, pngFilename) {
    const svgPath = path.join(projectDir, svgFilename);
    const pngPath = path.join(projectDir, pngFilename);
    
    if (!fs.existsSync(svgPath)) {
        console.error(`File not found: ${svgPath}`);
        return;
    }
    
    const svgBuffer = fs.readFileSync(svgPath);
    
    try {
        const resvg = new Resvg(svgBuffer, {
            fitTo: {
                mode: 'original'
            }
        });
        
        const pngData = resvg.render();
        const pngBuffer = pngData.asPng();
        
        fs.writeFileSync(pngPath, pngBuffer);
        console.log(`Successfully converted ${svgFilename} to ${pngFilename}`);
    } catch (err) {
        console.error(`Error converting ${svgFilename}:`, err);
    }
}

convert('cdm_geosite.svg', 'cdm_geosite.png');
convert('pdm_geosite.svg', 'pdm_geosite.png');
