from pdf2image import convert_from_path

def pdf_to_image(pdf_path):
    images = convert_from_path(pdf_path)
    for i, image in enumerate(images):
        image.save(f'{pdf_path}_{i}.jpg', 'JPEG')
